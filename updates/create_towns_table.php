<?php namespace VojtaSvoboda\LocationTown\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;
use System\Classes\PluginManager;

class CreateTownsTable extends Migration
{
    public $table_name = 'vojtasvoboda_locationtown_towns';

    public function up()
    {
        Schema::create($this->table_name, function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            if ( $this->isPluginActive('RainLab.Location') ) {
                $table->integer('state_id')->unsigned()->nullable();
                $table->foreign('state_id')->references('id')->on('rainlab_location_states')->onDelete('set null');
            }

            $table->string('name', 300);
            $table->string('slug', 300)->index();
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_enabled')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table($this->table_name, function ($table) {
            $table->dropForeign('vojtasvoboda_locationtown_towns_state_id_foreign');
            $table->dropIndex('vojtasvoboda_locationtown_towns_state_id_foreign');
            $table->dropIndex('vojtasvoboda_locationtown_towns_slug_index');
        });

        Schema::dropIfExists($this->table_name);
    }

    private function isPluginActive($pluginName)
    {
        $pluginManager = PluginManager::instance();

        return array_key_exists($pluginName, $pluginManager->getPlugins());
    }
}
