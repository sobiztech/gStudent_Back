<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationKeysController;
use App\Http\Controllers\AuthenticationsController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassesSubjectsController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ExamShedulesController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\GuardiansController;
use App\Http\Controllers\GuardianTypesController;
use App\Http\Controllers\MediumsController;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\PaymentDiscountsController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\PaymentOptionsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsSubjectsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\SubjectShedulesController;
use App\Http\Controllers\TeachersBranchesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//AuthenticationKeys--------------------------------------------------------------------
Route::GET('/authenticationKeys/show/all', [AuthenticationKeysController::class,'index']);
Route::GET('/authenticationKeys/show/{id}', [AuthenticationKeysController::class,'show']);
Route::POST('/authenticationKeys/store', [AuthenticationKeysController::class,'store']);
Route::POST('/authenticationKeys/update', [AuthenticationKeysController::class,'update']);
Route::DELETE('/authenticationKeys/delete', [AuthenticationKeysController::class,'delete']);

//Authentications--------------------------------------------------------------------
Route::GET('/authentications/show/all', [AuthenticationsController::class,'index']);
Route::GET('/authentications/show/{id}', [AuthenticationsController::class,'show']);
Route::POST('/authentications/store', [AuthenticationsController::class,'store']);
Route::POST('/authentications/update', [AuthenticationsController::class,'update']);
Route::DELETE('/authentications/delete', [AuthenticationsController::class,'delete']);

//Branches--------------------------------------------------------------------
Route::GET('/branches/show/all', [BranchesController::class,'index']);
Route::GET('/branches/show/{id}', [BranchesController::class,'show']);
Route::POST('/branches/store', [BranchesController::class,'store']);
Route::POST('/branches/update', [BranchesController::class,'update']);
Route::DELETE('/branches/delete', [BranchesController::class,'delete']);

//Classes--------------------------------------------------------------------
Route::GET('/classes/show/all', [ClassesController::class,'index']);
Route::GET('/classes/show/{id}', [ClassesController::class,'show']);
Route::POST('/classes/store', [ClassesController::class,'store']);
Route::POST('/classes/update', [ClassesController::class,'update']);
Route::DELETE('/classes/delete', [ClassesController::class,'delete']);

//ClassesSubjectsController--------------------------------------------------------------------
Route::GET('/classesSubjects/show/all', [ClassesSubjectsController::class,'index']);
Route::GET('/classesSubjects/show/{id}', [ClassesSubjectsController::class,'show']);
Route::POST('/classesSubjects/store', [ClassesSubjectsController::class,'store']);
Route::POST('/classesSubjects/update', [ClassesSubjectsController::class,'update']);
Route::DELETE('/classesSubjects/delete', [ClassesSubjectsController::class,'delete']);

//Discounts--------------------------------------------------------------------
Route::GET('/discounts/show/all', [DiscountsController::class,'index']);
Route::GET('/discounts/show/{id}', [DiscountsController::class,'show']);
Route::POST('/discounts/store', [DiscountsController::class,'store']);
Route::POST('/discounts/update', [DiscountsController::class,'update']);
Route::DELETE('/discounts/delete', [DiscountsController::class,'delete']);

//Employees--------------------------------------------------------------------
Route::GET('/employees/show/all', [EmployeesController::class,'index']);
Route::GET('/employees/show/{id}', [EmployeesController::class,'show']);
Route::POST('/employees/store', [EmployeesController::class,'store']);
Route::POST('/employees/update', [EmployeesController::class,'update']);
Route::DELETE('/employees/delete', [EmployeesController::class,'delete']);

//ExamShedules--------------------------------------------------------------------
Route::GET('/examShedules/show/all', [ExamShedulesController::class,'index']);
Route::GET('/examShedules/show/{id}', [ExamShedulesController::class,'show']);
Route::POST('/examShedules/store', [ExamShedulesController::class,'store']);
Route::POST('/examShedules/update', [ExamShedulesController::class,'update']);
Route::DELETE('/examShedules/delete', [ExamShedulesController::class,'delete']);

//Fees--------------------------------------------------------------------
Route::GET('/fees/show/all', [FeesController::class,'index']);
Route::GET('/fees/show/{id}', [FeesController::class,'show']);
Route::POST('/fees/store', [FeesController::class,'store']);
Route::POST('/fees/update', [FeesController::class,'update']);
Route::DELETE('/fees/delete', [FeesController::class,'delete']);

//Guardians--------------------------------------------------------------------
Route::GET('/guardians/show/all', [GuardiansController::class,'index']);
Route::GET('/guardians/show/{id}', [GuardiansController::class,'show']);
Route::POST('/guardians/store', [GuardiansController::class,'store']);
Route::POST('/guardians/update', [GuardiansController::class,'update']);
Route::DELETE('/guardians/delete', [GuardiansController::class,'delete']);

//GuardianTypes--------------------------------------------------------------------
Route::GET('/guardianTypes/show/all', [GuardianTypesController::class,'index']);
Route::GET('/guardianTypes/show/{id}', [GuardianTypesController::class,'show']);
Route::POST('/guardianTypes/store', [GuardianTypesController::class,'store']);
Route::POST('/guardianTypes/update', [GuardianTypesController::class,'update']);
Route::DELETE('/guardianTypes/delete', [GuardianTypesController::class,'delete']);

//Mediums--------------------------------------------------------------------
Route::GET('/mediums/show/all', [MediumsController::class,'index']);
Route::GET('/mediums/show/{id}', [MediumsController::class,'show']);
Route::POST('/mediums/store', [MediumsController::class,'store']);
Route::POST('/mediums/update', [MediumsController::class,'update']);
Route::DELETE('/mediums/delete', [MediumsController::class,'delete']);

//PaymentDetails--------------------------------------------------------------------
Route::GET('/paymentDetails/show/all', [PaymentDetailsController::class,'index']);
Route::GET('/paymentDetails/show/{id}', [PaymentDetailsController::class,'show']);
Route::POST('/paymentDetails/store', [PaymentDetailsController::class,'store']);
Route::POST('/paymentDetails/update', [PaymentDetailsController::class,'update']);
Route::DELETE('/paymentDetails/delete', [PaymentDetailsController::class,'delete']);

//PaymentDiscounts--------------------------------------------------------------------
Route::GET('/paymentDiscounts/show/all', [PaymentDiscountsController::class,'index']);
Route::GET('/paymentDiscounts/show/{id}', [PaymentDiscountsController::class,'show']);
Route::POST('/paymentDiscounts/store', [PaymentDiscountsController::class,'store']);
Route::POST('/paymentDiscounts/update', [PaymentDiscountsController::class,'update']);
Route::DELETE('/paymentDiscounts/delete', [PaymentDiscountsController::class,'delete']);

//PaymentMethods--------------------------------------------------------------------
Route::GET('/paymentMethods/show/all', [PaymentMethodsController::class,'index']);
Route::GET('/paymentMethods/show/{id}', [PaymentMethodsController::class,'show']);
Route::POST('/paymentMethods/store', [PaymentMethodsController::class,'store']);
Route::POST('/paymentMethods/update', [PaymentMethodsController::class,'update']);
Route::DELETE('/paymentMethods/delete', [PaymentMethodsController::class,'delete']);

//PaymentOptions--------------------------------------------------------------------
Route::GET('/paymentOptions/show/all', [PaymentOptionsController::class,'index']);
Route::GET('/paymentOptions/show/{id}', [PaymentOptionsController::class,'show']);
Route::POST('/paymentOptions/store', [PaymentOptionsController::class,'store']);
Route::POST('/paymentOptions/update', [PaymentOptionsController::class,'update']);
Route::DELETE('/paymentOptions/delete', [PaymentOptionsController::class,'delete']);

//Payments--------------------------------------------------------------------
Route::GET('/payments/show/all', [PaymentsController::class,'index']);
Route::GET('/payments/show/{id}', [PaymentsController::class,'show']);
Route::POST('/payments/store', [PaymentsController::class,'store']);
Route::POST('/payments/update', [PaymentsController::class,'update']);
Route::DELETE('/payments/delete', [PaymentsController::class,'delete']);

//Properties--------------------------------------------------------------------
Route::GET('/properties/show/all', [PropertiesController::class,'index']);
Route::GET('/properties/show/{id}', [PropertiesController::class,'show']);
Route::POST('/properties/store', [PropertiesController::class,'store']);
Route::POST('/properties/update', [PropertiesController::class,'update']);
Route::DELETE('/properties/delete', [PropertiesController::class,'delete']);

//Roles--------------------------------------------------------------------
Route::GET('/roles/show/all', [RolesController::class,'index']);
Route::GET('/roles/show/{id}', [RolesController::class,'show']);
Route::POST('/roles/store', [RolesController::class,'store']);
Route::POST('/roles/update', [RolesController::class,'update']);
Route::DELETE('/roles/delete', [RolesController::class,'delete']);

//Settings--------------------------------------------------------------------
Route::GET('/settings/show/all', [SettingsController::class,'index']);
Route::GET('/settings/show/{id}', [SettingsController::class,'show']);
Route::POST('/settings/store', [SettingsController::class,'store']);
Route::POST('/settings/update', [SettingsController::class,'update']);
Route::DELETE('/settings/delete', [SettingsController::class,'delete']);

//Students--------------------------------------------------------------------
Route::GET('/students/show/all', [StudentsController::class,'index']);
Route::GET('/students/show/{id}', [StudentsController::class,'show']);
Route::POST('/students/store', [StudentsController::class,'store']);
Route::POST('/students/update', [StudentsController::class,'update']);
Route::DELETE('/students/delete', [StudentsController::class,'delete']);

//StudentsSubjects--------------------------------------------------------------------
Route::GET('/studentsSubjects/show/all', [StudentsSubjectsController::class,'index']);
Route::GET('/studentsSubjects/show/{id}', [StudentsSubjectsController::class,'show']);
Route::POST('/studentsSubjects/store', [StudentsSubjectsController::class,'store']);
Route::POST('/studentsSubjects/update', [StudentsSubjectsController::class,'update']);
Route::DELETE('/studentsSubjects/delete', [StudentsSubjectsController::class,'delete']);

//Subjects--------------------------------------------------------------------
Route::GET('/subjects/show/all', [SubjectsController::class,'index']);
Route::GET('/subjects/show/{id}', [SubjectsController::class,'show']);
Route::POST('/subjects/store', [SubjectsController::class,'store']);
Route::POST('/subjects/update', [SubjectsController::class,'update']);
Route::DELETE('/subjects/delete', [SubjectsController::class,'delete']);

//SubjectShedules--------------------------------------------------------------------
Route::GET('/subjectShedules/show/all', [SubjectShedulesController::class,'index']);
Route::GET('/subjectShedules/show/{id}', [SubjectShedulesController::class,'show']);
Route::POST('/subjectShedules/store', [SubjectShedulesController::class,'store']);
Route::POST('/subjectShedules/update', [SubjectShedulesController::class,'update']);
Route::DELETE('/subjectShedules/delete', [SubjectShedulesController::class,'delete']);

//TeachersBranches--------------------------------------------------------------------
Route::GET('/teachersBranches/show/all', [TeachersBranchesController::class,'index']);
Route::GET('/teachersBranches/show/{id}', [TeachersBranchesController::class,'show']);
Route::POST('/teachersBranches/store', [TeachersBranchesController::class,'store']);
Route::POST('/teachersBranches/update', [TeachersBranchesController::class,'update']);
Route::DELETE('/teachersBranches/delete', [TeachersBranchesController::class,'delete']);

//Teachers--------------------------------------------------------------------
Route::GET('/teachers/show/all', [TeachersController::class,'index']);
Route::GET('/teachers/show/{id}', [TeachersController::class,'show']);
Route::POST('/teachers/store', [TeachersController::class,'store']);
Route::POST('/teachers/update', [TeachersController::class,'update']);
Route::DELETE('/teachers/delete', [TeachersController::class,'delete']);

//Users--------------------------------------------------------------------
Route::GET('/users/show/all', [UsersController::class,'index']);
Route::GET('/users/show/{id}', [UsersController::class,'show']);
Route::POST('/users/store', [UsersController::class,'store']);
Route::POST('/users/update', [UsersController::class,'update']);
Route::DELETE('/users/delete', [UsersController::class,'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
