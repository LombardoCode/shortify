<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{
  public function store(Request $request) {
    // Reglas de validación para crear un URL
		$reglas = [
			'url_original' => 'required|url',
		];

		// Mensajes de error personalizados.
		$mensajesPersonalizados = [
			'url_original.required' => 'El URL es obligatorio.',
			'url_original.url' => 'El URL no contiene un formato válido.',
		];

		// Realizamos la validación del formulario
		$validaciones = Validator::make($request->all(), $reglas, $mensajesPersonalizados);

		// Si la validación falla...
		if ($validaciones->fails()) {
			// Retornamos los errores
      return response()->json([
        'success' => false,
        'errores' => $validaciones->errors()
      ]);
		} else {
      // Verificamos si la url original ya existe en la base de datos
      $existe_url = Url::where('url_original', $request['url_original'])->get();

      if (count($existe_url) > 0) {
        return response()->json([
          'success' => true,
          'url_corta' => $existe_url[0]['url_corta']
        ]);
      } else {
        // Creamos una variable para determinar si una URL no tenga un código repetido
        $existe_codigo = true;
        $codigo_generado = null;

        do {
          // Generamos un código aleatorio
          $codigo_generado = $this->generar_codigo_aleatorio();

          // Verificamos si el código generado no lo tiene otra URL, de tenerlo, generamos otro código hasta obtener uno que no haya sido tomado anteriormente
          $url_bd = Url::where('url_corta', $codigo_generado)->get();

          if (count($url_bd) == 0) {
            $existe_codigo = false;
          }
        }
        while($existe_codigo);

        // Creamos el URL
        $url_nueva = new Url([
          'url_original' => $request['url_original'],
          'url_corta' => $codigo_generado
        ]);

        // Si los datos fueron guardados correctamente...
        if ($url_nueva->save()) {
          return response()->json([
            'success' => true,
            'url_corta' => $url_nueva['url_corta']
          ]);
        }
      }
		}
  }

  public function generar_codigo_aleatorio() {
    $caracteres_permitidos = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $longitud_de_codigo = 6;
    $codigo_generado = '';

    for ($i=0; $i < $longitud_de_codigo; $i++) {
      $length_posibles_caracteres = strlen($caracteres_permitidos);
      $posicion_random = rand(0, $length_posibles_caracteres - 1);

      $caracter = $caracteres_permitidos[$posicion_random];
      $codigo_generado = $codigo_generado . $caracter;
    }

    return $codigo_generado;
  }

  public function redirect($codigo_url) {
    // Buscamos si el código existe en la base de datos
    $url = Url::where('url_corta', $codigo_url)->get();

    // En caso de existir...
    if (count($url) > 0) {
      // Redireccionamos al usuario al URL en cuestión
      return redirect($url[0]['url_original']);
    } else { // De no existir...
      // Redirigimos al usuario a la página principal
      $url_host = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/";
      return redirect($url_host);
    }
  }
}
