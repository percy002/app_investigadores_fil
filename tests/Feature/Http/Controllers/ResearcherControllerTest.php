<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Researcher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ResearcherController
 */
final class ResearcherControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $researchers = Researcher::factory()->count(3)->create();

        $response = $this->get(route('researchers.index'));

        $response->assertOk();
        $response->assertViewIs('researcher.index');
        $response->assertViewHas('researchers');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('researchers.create'));

        $response->assertOk();
        $response->assertViewIs('researcher.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResearcherController::class,
            'store',
            \App\Http\Requests\ResearcherStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $apellidos_nombres = fake()->word();
        $genero = fake()->randomElement(/** enum_attributes **/);
        $documento_de_identidad = fake()->word();
        $pais_nacimiento = fake()->word();
        $fecha_nacimiento = Carbon::parse(fake()->date());
        $correo_institucional = fake()->word();
        $facultad_escuela = fake()->word();
        $categoria_docente = fake()->word();
        $tipo_contrato = fake()->word();
        $codigo_renacyt = fake()->word();
        $orcid = fake()->word();
        $tipo_ocupacion = fake()->word();
        $cti_vitae = fake()->word();
        $produccion_cientifica = fake()->word();
        $proyectos_investigacion = fake()->word();
        $linea_investigacion = fake()->word();
        $contacto_academico = fake()->word();
        $resumen_bibliografia = fake()->text();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('researchers.store'), [
            'apellidos_nombres' => $apellidos_nombres,
            'genero' => $genero,
            'documento_de_identidad' => $documento_de_identidad,
            'pais_nacimiento' => $pais_nacimiento,
            'fecha_nacimiento' => $fecha_nacimiento->toDateString(),
            'correo_institucional' => $correo_institucional,
            'facultad_escuela' => $facultad_escuela,
            'categoria_docente' => $categoria_docente,
            'tipo_contrato' => $tipo_contrato,
            'codigo_renacyt' => $codigo_renacyt,
            'orcid' => $orcid,
            'tipo_ocupacion' => $tipo_ocupacion,
            'cti_vitae' => $cti_vitae,
            'produccion_cientifica' => $produccion_cientifica,
            'proyectos_investigacion' => $proyectos_investigacion,
            'linea_investigacion' => $linea_investigacion,
            'contacto_academico' => $contacto_academico,
            'resumen_bibliografia' => $resumen_bibliografia,
            'status' => $status,
        ]);

        $researchers = Researcher::query()
            ->where('apellidos_nombres', $apellidos_nombres)
            ->where('genero', $genero)
            ->where('documento_de_identidad', $documento_de_identidad)
            ->where('pais_nacimiento', $pais_nacimiento)
            ->where('fecha_nacimiento', $fecha_nacimiento)
            ->where('correo_institucional', $correo_institucional)
            ->where('facultad_escuela', $facultad_escuela)
            ->where('categoria_docente', $categoria_docente)
            ->where('tipo_contrato', $tipo_contrato)
            ->where('codigo_renacyt', $codigo_renacyt)
            ->where('orcid', $orcid)
            ->where('tipo_ocupacion', $tipo_ocupacion)
            ->where('cti_vitae', $cti_vitae)
            ->where('produccion_cientifica', $produccion_cientifica)
            ->where('proyectos_investigacion', $proyectos_investigacion)
            ->where('linea_investigacion', $linea_investigacion)
            ->where('contacto_academico', $contacto_academico)
            ->where('resumen_bibliografia', $resumen_bibliografia)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $researchers);
        $researcher = $researchers->first();

        $response->assertRedirect(route('researchers.index'));
        $response->assertSessionHas('researcher.id', $researcher->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $researcher = Researcher::factory()->create();

        $response = $this->get(route('researchers.show', $researcher));

        $response->assertOk();
        $response->assertViewIs('researcher.show');
        $response->assertViewHas('researcher');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $researcher = Researcher::factory()->create();

        $response = $this->get(route('researchers.edit', $researcher));

        $response->assertOk();
        $response->assertViewIs('researcher.edit');
        $response->assertViewHas('researcher');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResearcherController::class,
            'update',
            \App\Http\Requests\ResearcherUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $researcher = Researcher::factory()->create();
        $apellidos_nombres = fake()->word();
        $genero = fake()->randomElement(/** enum_attributes **/);
        $documento_de_identidad = fake()->word();
        $pais_nacimiento = fake()->word();
        $fecha_nacimiento = Carbon::parse(fake()->date());
        $correo_institucional = fake()->word();
        $facultad_escuela = fake()->word();
        $categoria_docente = fake()->word();
        $tipo_contrato = fake()->word();
        $codigo_renacyt = fake()->word();
        $orcid = fake()->word();
        $tipo_ocupacion = fake()->word();
        $cti_vitae = fake()->word();
        $produccion_cientifica = fake()->word();
        $proyectos_investigacion = fake()->word();
        $linea_investigacion = fake()->word();
        $contacto_academico = fake()->word();
        $resumen_bibliografia = fake()->text();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('researchers.update', $researcher), [
            'apellidos_nombres' => $apellidos_nombres,
            'genero' => $genero,
            'documento_de_identidad' => $documento_de_identidad,
            'pais_nacimiento' => $pais_nacimiento,
            'fecha_nacimiento' => $fecha_nacimiento->toDateString(),
            'correo_institucional' => $correo_institucional,
            'facultad_escuela' => $facultad_escuela,
            'categoria_docente' => $categoria_docente,
            'tipo_contrato' => $tipo_contrato,
            'codigo_renacyt' => $codigo_renacyt,
            'orcid' => $orcid,
            'tipo_ocupacion' => $tipo_ocupacion,
            'cti_vitae' => $cti_vitae,
            'produccion_cientifica' => $produccion_cientifica,
            'proyectos_investigacion' => $proyectos_investigacion,
            'linea_investigacion' => $linea_investigacion,
            'contacto_academico' => $contacto_academico,
            'resumen_bibliografia' => $resumen_bibliografia,
            'status' => $status,
        ]);

        $researcher->refresh();

        $response->assertRedirect(route('researchers.index'));
        $response->assertSessionHas('researcher.id', $researcher->id);

        $this->assertEquals($apellidos_nombres, $researcher->apellidos_nombres);
        $this->assertEquals($genero, $researcher->genero);
        $this->assertEquals($documento_de_identidad, $researcher->documento_de_identidad);
        $this->assertEquals($pais_nacimiento, $researcher->pais_nacimiento);
        $this->assertEquals($fecha_nacimiento, $researcher->fecha_nacimiento);
        $this->assertEquals($correo_institucional, $researcher->correo_institucional);
        $this->assertEquals($facultad_escuela, $researcher->facultad_escuela);
        $this->assertEquals($categoria_docente, $researcher->categoria_docente);
        $this->assertEquals($tipo_contrato, $researcher->tipo_contrato);
        $this->assertEquals($codigo_renacyt, $researcher->codigo_renacyt);
        $this->assertEquals($orcid, $researcher->orcid);
        $this->assertEquals($tipo_ocupacion, $researcher->tipo_ocupacion);
        $this->assertEquals($cti_vitae, $researcher->cti_vitae);
        $this->assertEquals($produccion_cientifica, $researcher->produccion_cientifica);
        $this->assertEquals($proyectos_investigacion, $researcher->proyectos_investigacion);
        $this->assertEquals($linea_investigacion, $researcher->linea_investigacion);
        $this->assertEquals($contacto_academico, $researcher->contacto_academico);
        $this->assertEquals($resumen_bibliografia, $researcher->resumen_bibliografia);
        $this->assertEquals($status, $researcher->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $researcher = Researcher::factory()->create();

        $response = $this->delete(route('researchers.destroy', $researcher));

        $response->assertRedirect(route('researchers.index'));

        $this->assertModelMissing($researcher);
    }
}
