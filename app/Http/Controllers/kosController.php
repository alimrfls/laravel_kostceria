<?php

namespace App\Http\Controllers;

use App\Reviews;
use Auth;
use App\KosList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class kosController extends Controller
{

    public function index(){
        /*Menampilkan kost yang ada pada halaman utama*/
        $kost =  DB::table('koslist')->paginate(6);
        return view('welcome',['koslist' => $kost]);
    }

    public function viewDetails($id){

        /*Mengambil data-data kos yang ada*/
        $result = KosList::where('id',$id)->get();

        /*Mengambil data review sesuai id kos yang di review*/
        $reviews = Reviews::where('id_kos',$id)->paginate(10);

        return view('viewKos')->with([
            'res' => $result,
            'rev' => $reviews
        ]);

    }

    public function add(Request $request){

        /*Validator form penambahan kosan*/
        $rules = [
            'nama' => 'required',
            'tipe' => 'required',
            'desc' => 'required|min:10|max:255',
            'alamat' => 'required',
            'fasilitas' => 'required',
            'telepon' => 'required',
            'coordinate' => 'required',
            'harga' => 'required|numeric'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect('/tambah-kos')->withErrors($validator)->withInput();
        }

        $fasilitas = implode(", ", $request->get('fasilitas')); /*Membungkus array dari checkbox fasilitas*/
        $namafile = str_replace(' ','_',$request['nama']); /*Mengubah spasi menjadi underscore pada nama kosan untuk dijadikan nama file foto yang di upload*/

        $newKos = new KosList();
        $newKos->fasilitas = $fasilitas;
        $newKos->nama_kos = $request['nama'];
        $newKos->tipe_kos = $request['tipe'];
        $newKos->desc_kos = $request['desc'];
        $newKos->alamat_kos = $request['alamat'];
        $newKos->coordinate_kos = $request['coordinate'];
        $newKos->telepon_kos = $request['telepon'];
        $newKos->harga_kos = $request['harga'];


        $idx = 1; /*Menginisialisasi jumlah foto kos dengan variabel index*/

        foreach ($request->file('fotokos') as $foto){
            /*Memasukan setiap foto yang di upload ke dalam direkotri public/images/daftar_kos/nama_kos */
            $foto->move('images/daftar_kos/'.str_replace(' ','_',$request['nama']).'/',$namafile.'_'.$idx.'.'.$foto->getClientOriginalExtension());
            $newKos->thumbnail_kos = $namafile.'_1.'.$foto->getClientOriginalExtension();

            /*Menambah jumlah foto kos sesuai variabel index*/
            $idx++;
            $newKos->total_foto_kos = $idx;
        }

        $newKos->total_foto_kos = $newKos->total_foto_kos-1; /*Mengurangi 1 dari jumlah fotokos karena index mulai pada angka 1*/
        $newKos->save();

        return redirect('/')->with('alert','Kost berhasil ditambahkan');
    }

    public function search(Request $request){
        $keyword = $request['katakunci'];
        $searchKos = KosList::where('nama_kos','LIKE',"%$keyword%")->paginate(10); /*Mencari kos sesuai dengan namakos yang mengandung keyword*/
        /*Tambah kode filter jika ada*/
        return view('search',['result'=>$searchKos, 'key' => $keyword]);
    }

    public function login(Request $request){

        /*Mengecek apakah data yang dimasukan saat login terdaftar di database*/
        if(Auth::attempt(
            ['email' => $request['email'], 'password' => $request['password']]
        )){
            return redirect('/')->with('login_alert','Selamat Datang,');
        }

        return redirect('/login')->with('wrong_alert','Username atau password tidak valid');;
    }

    public function register(Request $request){

        /*Validator daftar user*/
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'agree_checkbox' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }

        /*Menambahkan user baru ke database dengan role 'user' */
        $newUser = new User();
        $newUser->name = $request['name'];
        $newUser->email = $request['email'];
        $newUser->password = bcrypt($request['password']);
        $newUser->role = "user";

        $newUser->save();

        return redirect('/login')->with('alert','Akun berhasil didaftarkan! Login sekarang');
    }

    public function doLogout(){
        Auth::logout(); /*User logout*/
        return redirect('/');
    }

    public function manageUser (){
        $datauser = User::where('role','=',"user")->paginate(25); /*Mengambil data dari tabel users yang memiliki role users*/
        return view('admin.manage-user',['users' => $datauser]);
    }

    public function manageKos (){
        $datakos = KosList::paginate(10); /*Mengambil semua data kos*/
        return view('admin.manage-kos',['kosan' => $datakos]);
    }

    public function deleteUser($id){
        $user = User::find($id); /*Mengambil data user sesuai id user*/
        $user->delete(); /*Menghapus user yang dipilih sesuai id user*/
        return redirect('/manage-user')->with('alert','User berhasil dihapus');
    }

    public function tambahRating(Request $request, $id){

        /*Validator penambahan review dan pemberian rating kos*/

        $rules = [
            'review'=>'required|min:10|max:254',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect("/view/$id")->withErrors($validator)->withInput();
        }

        $rate = KosList::find($id); /*Mengambil data kos sesuai id kos untuk ditambahkan ratingnya di kolom rating pada database*/
        $rate->rating = ($rate->rating + $request['rating-val']);
        $rate->total_user = $rate->total_user + 1; /*total user yang mereview bertambah 1 setiap ada user yang menambahkan review*/
        $rate->save();

        /*Menambahkan data review ke tabel review sesuai id kos*/
        $rev = new Reviews();
        $rev->id_kos = $id;
        $rev->review_data = $request['review'];
        $rev->nama_user = Auth::user()->name;
        $rev->user_rate = $request['rating-val'];
        $rev->save();

        return redirect("/view/$id")->with('alert','Terima Kasih, Review anda berhasil ditambahkan');
    }

    public function deleteKos($id){
        /*Menghapus kosan sesuai id kos*/
        $kos = KosList::find($id);
        $kos->delete();
        $foto = $kos->total_foto_kos;

        /*Untuk setiap foto kos akan ikut terhapus dengan kode looping dibawah*/
        for ($i=1;$i<=$foto;$i++){
            unlink('images/daftar_kos/'.str_replace(' ','_',$kos->nama_kos).'/'.str_replace('_1',"_$i",$kos->thumbnail_kos));
        }
        return redirect('/manage-kos')->with('alert','Kost berhasil dihapus');;
    }

    public function updateKos($id){
        /*Mengambil data kos sesuai id untuk dibawa ke view update-kos*/
        $updateKos = KosList::find($id);
        return view('admin.update-kos',['kos'=> $updateKos]);
    }

    public function updateUser($id){
        /*Mengambil data user sesuai id untuk dibawa ke view update-user*/

        $updateUser = User::find($id);
        return view('admin.update-user',['users'=> $updateUser]);
    }

    public function doUpdateUser(Request $request, $id){

        /*Validator update user*/
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect("/update-user/$id")->withErrors($validator)->withInput();
        }

        /*Mengambil data user sesuai id untuk di update dengan data yang baru*/
        $user = User::find($id);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->save();

        return redirect('/manage-user')->with('alert','User berhasil diperbarui');;
    }

    public function doUpdateKos(Request $request, $id){

        /*Validator form update kos*/
        $rules = [
            'nama' => 'required',
            'tipe' => 'required',
            'desc' => 'required|min:10|max:255',
            'alamat' => 'required',
            'coordinate' => 'required',
            'harga' => 'required|numeric'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect('/manage-kos')->withErrors($validator)->withInput();
        }

        /*Mengambil data kos sesuai id untuk di update dengan data yang baru*/
        $updateKos = KosList::find($id);

        $namafile = str_replace('_1','',$updateKos->thumbnail_kos); /*mengganti spasi pada nama kos menjadi underscore untuk di gunakan di file foto yang di upload*/

        /*Mengupdate data kos*/
        $updateKos->nama_kos = $request['nama'];
        $updateKos->tipe_kos = $request['tipe'];
        $updateKos->desc_kos = $request['desc'];
        $updateKos->alamat_kos = $request['alamat'];
        $updateKos->coordinate_kos = $request['coordinate'];
        $updateKos->harga_kos = $request['harga'];

        /*Kode ini akan jalan kalau 1 atau lebih checkbox update fasilitas di centang*/
        if ($request['fasilitas']){
            /*Fungsi implode untuk membungkus array dari value checkbox*/
            $fasilitas1 = implode(", ", $request['fasilitas']);
            $updateKos->fasilitas = $fasilitas1;
        }

        /*Kalau ada tambahan upload foto, kode dibawah akan jalan*/
        if ($request->hasFile('fotokos')){
            $newPhotoIdx = $updateKos->total_foto_kos + 1;
            foreach ($request->file('fotokos') as $foto){
                /*File yang di upload akan dipindahkan ke direktori images didalam direktori public dengan nama sesuai nama kos dan extensi file*/
                $foto->move('images/daftar_kos/'.str_replace(' ','_',$updateKos->nama_kos).'/',str_replace('_1',"_$newPhotoIdx",$updateKos->thumbnail_kos));
                $newPhotoIdx++;
                $updateKos->total_foto_kos += 1; /*Menambah total foto kos*/
            }
        }

        $updateKos->save();
        return redirect('/manage-kos')->with('alert','Kost berhasil diperbarui');;

    }

    public function deletePhoto($id,$photo_id){

        $kosData = KosList::find($id); /*mengambil data kos sesuai id*/

        unlink('images/daftar_kos/'.str_replace(' ','_',$kosData->nama_kos).'/'.str_replace('_1',"_$photo_id",$kosData->thumbnail_kos)); /*Menghapus foto sesuai nama file didalam direktori public/images*/

        /*Looping dibawah untuk merubah nama foto yang ada menjadi berurutan setelah 1 foto dihapus*/
        for ($i=($photo_id+1);$i<=$kosData->total_foto_kos;$i++){
            rename(public_path('images/daftar_kos/'.str_replace(' ','_',$kosData->nama_kos).'/'.str_replace('_1',"_$i",$kosData->thumbnail_kos)),public_path('/images/'.str_replace('_1',"_$photo_id",$kosData->thumbnail_kos)));
            $photo_id++;
        }
        $kosData->total_foto_kos -= 1; /*Mengurangi 1 dari total foto kos yang ada*/

        $kosData->save();

        return redirect("/update-kos/$id");
    }

    public function deleteReview($id){
        $review = Reviews::find($id); /*Mengambil data review sesuai id untuk dihapus*/

        $koslist = KosList::find($review->id_kos); /*Mencari kost sesuai kos id yang ada di tabel review*/
        $koslist->rating = $koslist->rating - $review->user_rate; /*Mengurangi rating kos sesuai dengan rating yang di hapus*/
        $koslist->total_user -= 1; /*Total user yang memberi review dan rating berkurang 1*/

        $koslist->save();
        $review->delete();

        return redirect()->back()->with('alert','Review berhasil dihapus. (Rating tidak berubah)');
    }

}
