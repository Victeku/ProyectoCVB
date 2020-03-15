<?php

use App\Usuarios;
use App\Productos;
use App\Estados;
use App\Municipios;
use App\Almacen;
use App\Pago;
use App\Tickets;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Usuarios::truncate();
        Productos::truncate();
        Estados::truncate();
        Municipios::truncate();
        Almacen::truncate();
        Pago::truncate();
        Tickets::truncate();

        Usuarios::flushEventListeners();
        Productos::flushEventListeners();
        Estados::flushEventListeners();
        Municipios::flushEventListeners();
        Almacen::flushEventListeners();
        Pago::flushEventListeners();
        Tickets::flushEventListeners();

        $cantidadUsuarios = 10;
        $cantidadProductos = 10;
        $cantidadEstados = 10;
        $cantidadMunicipios = 10;
        $cantidadAlmacen = 10;
        $cantidadPago = 10;
        $cantidadTickets = 10;


        factory(Usuarios::class, $cantidadUsuarios)->create();
        factory(Estados::class, $cantidadEstados)->create();
        factory(Productos::class, $cantidadProductos)->create();
        factory(Municipios::class, $cantidadMunicipios)->create();
        factory(Almacen::class, $cantidadAlmacen)->create();
        factory(Pago::class, $cantidadPago)->create();
        factory(Tickets::class, $cantidadTickets)->create();
    }
}
