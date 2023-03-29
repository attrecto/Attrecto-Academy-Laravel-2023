<?php
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $courses = Course::all();

        foreach($courses as $course){
            $user = User::where('email','=',$course->author)->first();

            if(!empty($user)){
                $course->author_id =  $user->id;
                $course->save();
            }
        }

        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('author');
        });
    }
};
