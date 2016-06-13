<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Books", 'books', 'name', [
            // ["field_name_db", "Label", "UI Type", "Readonly", "Default_Value", "min_length", "max_length", "Required", "Pop_values"]
            ["name", 'Name', 'Name', false, '', 5, 256, true],
            ["author", 'Author', 'String', false, '', 0, 50, true],
            ["author_address", 'Author Address', 'Address', false, '', 0, 1000, true],
            ["price", 'Price', 'Currency', false, 0.0, 0, 2, true],
            ["weight", 'Weight', 'Decimal', false, 0.0, 0, 2, true],
            ["pages", 'Pages', 'Integer', false, 0, 0, 5, false],
            ["genre", 'Genre', 'Taginput', false, ['Fantacy','Adventure'], 0, 0, false],
            ["publisher", 'Publisher', 'Dropdown', false, 'Marvel', 0, 0, false, ['Bloomsbury','Marvel','Universal']],
            ["status", 'Status', 'Radio', false, 'Published', 0, 0, false, ['Draft','Published','Unpublished']],
            ["media_type", 'Media Type', 'Multiselect', false, ['Audiobook'], 0, 0, false, ['Print','Audiobook','E-book']],
            ["description", 'Description', 'Textarea', false, '', 0, 1000, false],
            ["email", 'Email', 'Email', false, '', 0, 0, false],
            ["restricted", 'Restricted', 'Checkbox', false, false, 0, 0, false],
            ["mobile", 'Mobile', 'Mobile', false, '', 0, 0, false],
            ["preview", 'Preview Image', 'Image', false, '', 0, 0, false],
            ["website", 'Website', 'URL', false, '', 0, 0, false],
            ["date_release", 'Date of Release', 'Date', false, date("Y-m-d"), 0, 0, false],
            ["time_started", 'Start Time', 'Datetime', false, date("Y-m-d H:i:s"), 0, 0, false]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('books')) {
            Schema::drop('books');
        }
    }
}
