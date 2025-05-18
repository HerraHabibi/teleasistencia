<?php

namespace App\Http\Controllers;

use App\Models\BeneficiarioInteres;
use App\Models\Contacto;
use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function index()
    {
        return view('gestion.index');
    }

    public function create()
    {
        return view('gestion.altabeneficiario');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'required|string|unique:beneficiarios,dni',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'num_seguridad_social' => 'required|string|unique:beneficiarios,num_seguridad_social',
            'sexo' => 'required|string',
            'estado_civil' => 'required|string',
            'tipo_beneficiario' => 'required|string',
            'direccion' => 'required|string',
            'codigo_postal' => 'required|string',
            'localidad' => 'required|string',
            'provincia' => 'required|string',
            'email' => 'required|string|unique:beneficiarios,email',
            'situacion_familiar' => 'required|string',
            'situacion_sanitaria' => 'required|string',
            'observaciones' => 'required|string',
            'situacion_de_la_vivienda' => 'required|string',
            'situacion_economica' => 'required|string',
            'otros_recursos' => 'required|string',
            'instalacion_de_terminal' => 'required|string',
            'otros_complementos_TAS' => 'required|string',
            'dispone_de_teleasistencia_movil' => 'required|string',
            'sistema_de_telelocalizacion' => 'required|string',
            'custodia_de_llaves' => 'required|string'
        ]);

        
        try {
            Gestion::create($validatedData);
            return redirect()->route('gestion.index')->with('success', 'Beneficiario creado con éxito');
        } catch (\Exception $e) {
            return redirect()->route('gestion.error')->with('error', 'Error al crear el beneficiario ')->withInput();
        }

        return redirect()->route('gestion.index')->with('success', 'Beneficiario creado con éxito');
    }

    public function show($id)
    {
        $beneficiario = Gestion::findOrFail($id);
        return view('gestion.consultabeneficiario', compact('beneficiario'));
    }

    public function edit($id)
    {
        $beneficiario = Gestion::findOrFail($id);
        return view('gestion.modificarbeneficiario', compact('beneficiario'));
    }

    public function update(Request $request, $id)
    {
        $beneficiario = Gestion::findOrFail($id);

        try{
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'required|string|unique:beneficiarios,dni,'.$beneficiario->id,
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'num_seguridad_social' => 'required|string|unique:beneficiarios,num_seguridad_social,'.$beneficiario->id,
            'sexo' => 'required|string',
            'estadocivil' => 'required|string',
            'tipo' => 'required|string',
            'direccion' => 'required|string',
            'codigo_postal' => 'required|string',
            'localidad' => 'required|string',
            'provincia' => 'required|string',
            'email' => 'required|string',
            'situacion_familiar' => 'required|string',
            'situacion_sanitaria' => 'required|string',
            'observaciones' => 'required|string',
            'situacion_de_la_vivienda' => 'required|string',
            'situacion_economica' => 'required|string',
            'otros_recursos' => 'required|string',
            'instalacion_de_terminal' => 'required|string',
            'otros_complementos_TAS' => 'required|string',
            'dispone_de_teleasistencia_movil' => 'required|string',
            'sistema_de_telelocalizacion' => 'required|string',
            'custodia_de_llaves' => 'required|string'
        ]);
            $beneficiario->update($request->all());
            return redirect()->route('gestion.actualizar')->with('success', 'Beneficiario actualizado con éxito');
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            return redirect()->route('gestion.actualizar')->with('error', 'Beneficiario actualizado sin éxito'. $errorMessage);
        }
    }

    public function destroy($id)
    {
        $beneficiario = Gestion::findOrFail($id);
        $beneficiario->delete();

        return redirect()->route('gestion.index')->with('success', 'Beneficiario eliminado con éxito');
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:255',
        ]);

        $dni = $request->input('dni');
        $beneficiario = Gestion::where('dni', $dni)->first();

        if ($beneficiario) {
            return view('gestion.resultados', ['beneficiario' => $beneficiario]);
        } else {
            return redirect()->route('gestion.actualizar')->with('error', 'Beneficiario no encontrado.');
        }
    }
    public function error()
    {
        return view('gestion.error');
    }
    public function errorContacto()
    {
        return view('gestion.error_contacto');
    }
    public function contactos()
    {
        return view('gestion.asignar_contactos');
    }
    public function contactosbusqueda(Request $request)
    {
        $dni = $request->input('dni');
        $contacto = Gestion::where('dni', $dni)->first();
        if (!$contacto) {
            return redirect()->route('gestion.contactos')->with('error', 'Beneficiario no encontrado.');
        }
        return view('gestion.crear_contacto', compact('contacto'));
    }
    public function crearContacto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'tipo' => 'required|string',
            'direccion' => 'required|string|max:255',
            'codigopostal' => 'required|string|max:10',
            'localidad' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'dni_beneficiario' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'dispone_llave_del_domicilio' => 'required|string',
            'observaciones' => 'required|string',
        ]);

        try {
            Contacto::create([
                'nombre' => $request->input('nombre'),
                'apellidos' => $request->input('apellidos'),
                'telefono' => $request->input('telefono'),
                'tipo' => $request->input('tipo'),
                'direccion' => $request->input('direccion'),
                'codigopostal' => $request->input('codigopostal'),
                'localidad' => $request->input('localidad'),
                'provincia' => $request->input('provincia'),
                'dni_beneficiario' => $request->input('dni_beneficiario'),
                'email' => $request->input('email'),
                'dispone_llave_del_domicilio' => $request->input('dispone_llave_del_domicilio'),
                'observaciones' => $request->input('observaciones'),
            ]);
    
            return redirect()->route('gestion.contactos')->with('success', 'Contacto creado exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->route('gestion.error.contacto')->with('error', 'Ha ocurrido un error al crear el contacto revise si estan repetidos algun dato');
        }
    }
    public function showDeleteForm()
    {
        return view('gestion.borrarbeneficiario');
    }

    public function searchBeneficiario(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:20',
        ]);

        $beneficiario = Gestion::where('dni', $request->dni)->first();

        if ($beneficiario) {
            return view('gestion.resultadosborrar', compact('beneficiario'));
        } else {
            return redirect()->route('gestion.borrar.beneficiario.form')->with('error', 'Beneficiario no encontrado.');
        }
    }

    public function deleteBeneficiario($id)
    {
        $beneficiario = Gestion::find($id);

        if ($beneficiario) {
            $beneficiario->delete();
            return redirect()->route('gestion.borrar.beneficiario.form')->with('success', 'Beneficiario borrado exitosamente.');
        } else {
            return redirect()->route('gestion.borrar.beneficiario.form')->with('error', 'Beneficiario no encontrado.');
        }
    }
    public function interesview()
    {
        return view('gestion.asignar_interes');
    }
    public function interes(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:9'
        ]);

        $dni = $request->input('dni');
        $beneficiarioInteres = BeneficiarioInteres::where('dni_beneficiario', $dni)->first();

        if ($beneficiarioInteres) {
            return redirect()->back()->with('error', 'Datos ya asignados');
        }

        return redirect()->route('gestion.interes.view', ['dni' => $dni]);
    }
    public function interesguardarview(Request $request)
    {
        $dni = $request->input('dni');
        return view('gestion.datos_interes', compact('dni'));
    }
    public function interesguardar(Request $request)
    {
        $request->validate([
            'dni_beneficiario' => 'required|string|max:9',
            'enfermedades' => 'nullable|string|max:255',
            'alergias' => 'nullable|string|max:255',
            'medicacion_manana' => 'nullable|string|max:255',
            'medicacion_tarde' => 'nullable|string|max:255',
            'medicacion_noche' => 'nullable|string|max:255',
            'observaciones' => 'required|string',
        ]);

        try {
            $beneficiarioInteres = new BeneficiarioInteres();
            $beneficiarioInteres->dni_beneficiario = $request->dni_beneficiario;
            $beneficiarioInteres->enfermedades = $request->enfermedades;
            $beneficiarioInteres->alergias = $request->alergias;
            $beneficiarioInteres->medicacion_manana = $request->medicacion_manana;
            $beneficiarioInteres->medicacion_tarde = $request->medicacion_tarde;
            $beneficiarioInteres->medicacion_noche = $request->medicacion_noche;
            $beneficiarioInteres->observaciones = $request->observaciones;

            $beneficiarioInteres->save();

            return redirect()->route('gestion.interes')->with('success', 'Beneficiario de interés creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema al crear el beneficiario de interés');
        }
    }
    public function interesmodificarview()
    {
        return view('gestion.modificar_interes');
    }
    public function interesmodificar(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:9'
        ]);

        $dni = $request->input('dni');
        $beneficiario = Gestion::where('dni', $dni)->first();
        $beneficiarioInteres = BeneficiarioInteres::where('dni_beneficiario', $dni)->first();

        if (!$beneficiario) {
            return redirect()->back()->with('error', 'El DNI no existe en la tabla Beneficiario.');
        } elseif (!$beneficiarioInteres) {
            return redirect()->back()->with('error', 'Datos no asignados.');
        } else {
            return view('gestion.modificar_datos_interes', compact('beneficiarioInteres'));
        }
    }
    public function guardarDatosInteres(Request $request)
    {
        $request->validate([
            'dni_beneficiario' => 'required|string|max:9',
            'enfermedades' => 'nullable|string|max:255',
            'alergias' => 'nullable|string|max:255',
            'medicacion_manana' => 'nullable|string|max:255',
            'medicacion_tarde' => 'nullable|string|max:255',
            'medicacion_noche' => 'nullable|string|max:255',
            'hora_preferente_manana' => 'required',
            'hora_preferente_tarde' => 'required',
            'hora_preferente_noche' => 'required',
            'ambulancia' => 'required|string|max:2',
            'policia' => 'required|string|max:2',
            'bomberos' => 'required|string|max:2',
            'urgencias' => 'required|string|max:2'
        ]);

        $beneficiarioInteres = new BeneficiarioInteres();

        $beneficiarioInteres->dni_beneficiario = $request->dni_beneficiario;
        $beneficiarioInteres->enfermedades = $request->enfermedades;
        $beneficiarioInteres->alergias = $request->alergias;
        $beneficiarioInteres->medicacion_manana = $request->medicacion_manana;
        $beneficiarioInteres->medicacion_tarde = $request->medicacion_tarde;
        $beneficiarioInteres->medicacion_noche = $request->medicacion_noche;
        $beneficiarioInteres->hora_preferente_manana = $request->hora_preferente_manana;
        $beneficiarioInteres->hora_preferente_tarde = $request->hora_preferente_tarde;
        $beneficiarioInteres->hora_preferente_noche = $request->hora_preferente_noche;
        $beneficiarioInteres->ambulancia = $request->ambulancia;
        $beneficiarioInteres->policia = $request->policia;
        $beneficiarioInteres->bomberos = $request->bomberos;
        $beneficiarioInteres->urgencias = $request->urgencias;

        $beneficiarioInteres->save();

        return redirect()->route('gestion.interes.buscar.modificar')->with('success', 'Datos de interés guardados correctamente.');
    }
    public function buscarcontacto()
    {
        return view('gestion.modificar_contacto'); // Vista del formulario de búsqueda
    }

    public function buscarPorEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;

        $contacto = Contacto::where('email', $email)->first();
        

        if (!$contacto) {
            return redirect()->back()->with('error', 'No se encontró ningún beneficiario con ese email.');
        }

        return view('gestion.modificar_contactos_view', compact('contacto'));
    }
    public function modificarContacto(Request $request)
    {
        $request->validate([
            'dni_beneficiario' => 'required|string|max:9',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'tipo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'codigopostal' => 'required|string|max:10',
            'localidad' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'dispone_llave_del_domicilio' => 'required|string|',
            'observaciones' => 'required|string|',
        ]);

        try {
            $contacto = Contacto::where('dni_beneficiario', $request->dni_beneficiario)->first();

            if (!$contacto) {
                return redirect()->route('gestion.interes')->with('error', 'No se encontró ningún contacto asociado a ese beneficiario.');
            }

            $contacto->nombre = $request->nombre;
            $contacto->apellidos = $request->apellidos;
            $contacto->telefono = $request->telefono;
            $contacto->tipo = $request->tipo;
            $contacto->direccion = $request->direccion;
            $contacto->codigopostal = $request->codigopostal;
            $contacto->localidad = $request->localidad;
            $contacto->provincia = $request->provincia;
            $contacto->email = $request->email;
            $contacto->dispone_llave_del_domicilio = $request->dispone_llave_del_domicilio;
            $contacto->observaciones = $request->observaciones;

            $contacto->save();

            return redirect()->route('gestion.contactos.buscar.mod')->with('success', 'Contacto modificado exitosamente.');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->route('gestion.contactos.buscar.mod')->with('error', 'Error al modificar el contacto: ' . $errorMessage);
        }
    }

}
