<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("department_id");
            $table->unsignedBigInteger("location_id");
            $table->unsignedBigInteger("employment_status_id");
            $table->unsignedBigInteger("employment_types_id");
            $table->integer("employee_id");
            $table->integer("job_grade");
            $table->enum("billability",["Billable","Non-billable"])->default("Billable");
            $table->enum("type", ["Rank-and-file", "Manager" , "Officer"]);
            $table->string("title",150);
            $table->date("date_hired");
            $table->date("date_regularization");
            $table->text("remarks");
            $table->integer("biometric");
            $table->enum("payroll_type",["Hourly","Daily", "Semi_Monthly","Monthly"]);
            $table->integer("payroll_pie_id");
            $table->integer("working_hours");


            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("department_id")->references("id")->on("departments")->onDelete("cascade")->onUpdate("cascade"); 
            $table->foreign("location_id")->references("id")->on("locations")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("employment_status_id")->references("id")->on("employment_status")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("employment_types_id")->references("id")->on("employment_types")->onDelete("cascade")->onUpdate("cascade");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
