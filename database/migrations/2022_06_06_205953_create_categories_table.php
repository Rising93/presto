<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->timestamps();
        });

        // "{{__('ui.motoriCategoria')}}", "{{__('ui.informaticaCategoria')}}", "{{__('ui.elettrodomesticiCategoria')}}", "{{__('ui.libriCategoria')}}", "{{__('ui.giochiCategoria')}}", "{{__('ui.sportCategoria')}}", "{{__('ui.immobiliCategoria')}}", "{{__('ui.telefoniCategoria')}}", "{{__('ui.arredamentoCategoria')}}", "{{__('ui.modaCategoria')}}", "{{__('ui.saluteCategoria')}}", "{{__('ui.musicaCategoria')}}"

        $categories = ['Motori', 'Informatica', 'Elettrodomestici', 'Libri', 'Giochi', 'Sport', 'Immobili', 'Telefoni', 'Arredamento', 'Moda', 'Salute','Musica'];

        foreach ($categories as $category) {
            Category::create(['name'=>$category]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
