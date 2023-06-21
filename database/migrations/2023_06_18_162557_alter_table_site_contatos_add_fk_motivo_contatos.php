<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table){
            //Criar uma coluna  motivo_contatos_id
            $table->unsignedBigInteger('motivo_contatos_id');
        });
        //Migrar os dados de motivo_contato para motivo_contatos_id
        //Atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //Aplicando fk em motivo_contatos_id apontando para coluna id da tabele_motivo_contato
        //Criação da FK e removendo a coluna motivo contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Criação a coluna motivo contato e removendo a Fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            //<tabela>_<coluna>_foreign
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');

            //Atribuindo motivo_contatos_id para a coluna motivo_contato
            DB::statement('update site_contatos set motivo_contatos = motivo_contato_id');
            
            //Removendo a coluna  motivo_contatos_id
            Schema::table('site_contatos', function (Blueprint $table){
                $table->dropColumn('motivo_contatos_id');
            });
        });
    }
}
