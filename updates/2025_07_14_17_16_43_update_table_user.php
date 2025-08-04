<?php namespace Beltechsoft\Compareshopaholic\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 *  Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('lovata_buddies_users') && !Schema::hasColumn('lovata_buddies_users', 'product_compare')) {

            Schema::table('lovata_buddies_users', function (Blueprint $obTable) {
                $obTable->text('product_compare')->nullable();
            });
        }

        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'product_compare')) {

            Schema::table('users', function (Blueprint $obTable) {
                $obTable->text('product_compare')->nullable();
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('lovata_buddies_users') && Schema::hasColumn('lovata_buddies_users', 'product_compare')) {
            Schema::table('lovata_buddies_users', function (Blueprint $obTable) {
                $obTable->dropColumn(['product_compare']);
            });
        }

        if (Schema::hasTable('users') && Schema::hasColumn('users', 'product_compare')) {
            Schema::table('users', function (Blueprint $obTable) {
                $obTable->dropColumn(['product_compare']);
            });
        }
    }
};
