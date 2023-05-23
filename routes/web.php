<?php
// use App\Http\Controllers\userController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('adm.index');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/tes', function () {
    return view('tes');
});

Route::get('/login', function(){
    return redirect('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'AuthController@logout');

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'AuthController@logout');

Route::resource('pertemuan', 'pertemuanController')->middleware('auth');
Route::get('/detail/{id}', 'detailController@index')->name('detail')->middleware('auth');
Route::post('/detail/{id}', 'detailController@store')->name('store')->middleware('auth');
Route::resource('exam', 'examController')->middleware('auth');
Route::get('/answer/{id}', 'answerController@index')->name('answer')->middleware('auth');
Route::post('/answer/{id}', 'answerController@store')->name('store')->middleware('auth');
Route::get('/score/{id}', 'scoreController@index')->name('score')->middleware('auth');
Route::post('/score/{id}', 'scoreController@store')->name('store')->middleware('auth');
Route::get('/rekap/{id}', 'rekapController@index')->name('rekap')->middleware('auth');

Route::resource('rekapan', 'rekapanController')->middleware('auth');
Route::resource('skp', 'skpController')->middleware('auth');

Route::resource('level', 'LevelController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::get('/users/{id}', 'usersController@index')->name('users')->middleware('auth');

Route::resource('usertahun', 'usertahunController')->middleware('auth');

Route::get('/user/file/{id}', 'UserController@file')->name('file')->middleware('auth');
Route::post('/user/file/{id}', 'UserController@filestore')->name('filestore')->middleware('auth');
// Route::get('/user/file/{id}',[userController::class, 'file'])->middleware('auth');

Route::resource('kelas', 'kelasController')->middleware('auth');
Route::get('detail/kehadiran/{id}', 'detailController@kehadiran')->name('kehadiran')->middleware('auth');
Route::get('/products/create-pdf/{id}', 'rekapController@exportPDF')->name('exportPDF')->middleware('auth');

Route::resource('quiz', 'quizController')->middleware('auth');
Route::resource('persediaan', 'persediaanController')->middleware('auth');
Route::get('/persediaans/export_excel', 'persediaanController@export_excel')->middleware('auth');

Route::resource('suratmasuk', 'suratmasukController')->middleware('auth');
Route::resource('suratkeluar', 'suratkeluarController')->middleware('auth');
Route::resource('indeks', 'indeksController')->middleware('auth');

Route::resource('renstra', 'renstraController')->middleware('auth');
Route::resource('renja', 'renjaController')->middleware('auth');
Route::resource('iku', 'ikuController')->middleware('auth');
Route::resource('lakip', 'lakipController')->middleware('auth');

Route::resource('masuk', 'masukController')->middleware('auth');
Route::get('/barangmasuk/{id}', 'barangmasukController@index')->name('barangmasuk')->middleware('auth');
Route::resource('keluar', 'keluarController')->middleware('auth');
Route::get('/barangkeluar/{id}', 'barangkeluarController@index')->name('barangkeluar')->middleware('auth');
Route::post('/barangkeluar/{id}', 'barangkeluarController@store')->name('store')->middleware('auth');
Route::get('/products/create-pdf/{id}', 'barangkeluarController@exportPDF')->name('exportPDF')->middleware('auth');
Route::get('/products/createe-pdf', 'persediaanController@exportPDF')->name('exportPDF')->middleware('auth');
Route::get('/nilai/{id}', 'nilaiController@index')->name('nilai')->middleware('auth');
Route::post('/nilai/{id}', 'nilaiController@store')->name('store')->middleware('auth');
Route::get('/soal/{id}', 'soalController@index')->name('soal')->middleware('auth');
Route::post('/soal/{id}', 'soalController@store')->name('store')->middleware('auth');
Route::get('/jawaban/{quiz_id}/{user_id}', 'jawabanController@index')->name('jawaban')->middleware('auth');
Route::post('/jawaban/{quiz_id}/{user_id}', 'jawabanController@store')->name('store')->middleware('auth');

Route::resource('tahun', 'tahunController')->middleware('auth');
Route::resource('kibb', 'kibbController')->middleware('auth');
Route::resource('kibc', 'kibcController')->middleware('auth');
Route::resource('kibd', 'kibdController')->middleware('auth');
Route::get('/kibbdetail/{id}', 'kibbdetailController@index')->name('kibbdetail')->middleware('auth');


// Route::resource('rekap', 'rekapController')->middleware('auth');
Route::get('/total/{id}', 'totalController@index')->name('total')->middleware('auth');
Route::post('/total/{id}', 'totalController@store')->name('store')->middleware('auth');


Route::resource('daftarkinerja', 'daftarkinerjaController')->middleware('auth');
Route::get('/produktifitas/{id}', 'produktifitasController@index')->name('produktifitas')->middleware('auth');
Route::post('/produktifitas/{id}', 'produktifitasController@store')->name('store')->middleware('auth');

Route::get('finger/{id}', 'fingerController@index')->name('finger')->middleware('auth');

Route::get('/editfinger/{id}', 'editfingerController@index')->name('editfinger')->middleware('auth');
Route::put('/editfinger/{id}', 'editfingerController@store')->name('store')->middleware('auth');

Route::get('/editkinerja/{id}', 'editkinerjaController@index')->name('editkinerja')->middleware('auth');
Route::put('/editkinerja/{id}', 'editkinerjaController@store')->name('store')->middleware('auth');

Route::get('/ubahfinger/{id}', 'ubahfingerController@index')->name('ubahfinger')->middleware('auth');
Route::put('/ubahfinger/{id}', 'ubahfingerController@store')->name('store')->middleware('auth');

Route::get('kinerja/{id}', 'kinerjaController@index')->name('kinerja')->middleware('auth');
Route::get('/days/{id}', 'daysController@index')->name('days')->middleware('auth');
Route::get('/kedisiplinan/{id}', 'kedisiplinanController@index')->name('kedisiplinan')->middleware('auth');
Route::post('/kedisiplinan/{id}', 'kedisiplinanController@store')->name('store')->middleware('auth');
Route::get('/total/create-pdf/{id}', 'totalController@exportPDF')->name('exportPDF')->middleware('auth');
Route::get('/totalpreview/create-pdf/{id}', 'totalController@exportPDFF')->name('exportPDFF')->middleware('auth');
Route::get('/kedisiplinan/create-pdf/{id}', 'kedisiplinanController@exportPDF')->name('exportPDF')->middleware('auth');

Route::get('/hasilkerja/{id}', 'hasilkerjaController@index')->name('hasilkerja')->middleware('auth');
Route::post('/hasilkerja/{id}', 'hasilkerjaController@store')->name('store')->middleware('auth');
Route::get('/hasilkerja/create-pdf/{id}', 'hasilkerjaController@exportPDF')->name('exportPDF')->middleware('auth');

Route::get('/perilakukerja/{id}', 'perilakukerjaController@index')->name('perilakukerja')->middleware('auth');
Route::post('/perilakukerja/{id}', 'perilakukerjaController@store')->name('store')->middleware('auth');
Route::get('/perilakukerja/create-pdf/{id}', 'perilakukerjaController@exportPDF')->name('exportPDF')->middleware('auth');

Route::get('/maintenance', 'maintenanceController@index')->name('maintenance')->middleware('auth');

Route::get('/hasilskp/{id}', 'hasilskpController@index')->name('hasilskp')->middleware('auth');
Route::post('/hasilskp/{id}', 'hasilskpController@store')->name('store')->middleware('auth');
Route::get('/hasilskp/create-pdf/{id}', 'hasilskpController@exportskp')->name('exportskp')->middleware('auth');
Route::get('/hasilskp/createe-pdf/{id}', 'hasilskpController@exportskpp')->name('exportskpp')->middleware('auth');

Route::get('password/change', 'Auth\AuthController@changePassword');
Route::post('password/change', 'Auth\AuthController@postChangePassword');



