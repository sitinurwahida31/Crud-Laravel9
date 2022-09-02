<?php

namespace App\Http\Controllers;

use App\Models\Apotek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApotekController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get apoteks
        $apoteks = Apotek::latest()->paginate(5);

        //render view with apoteks
        return view('apoteks.index', compact('apoteks'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('apoteks.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_ob'   => 'required|min:5',
            'jenis_ob'  => 'required|min:5',
            'stok_ob'   => 'required|numeric',
            'harga_ob'  => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/apoteks', $image->hashName());

        //create post
        Apotek::create([
            'image'     => $image->hashName(),
            'nama_ob'     => $request->nama_ob,
            'jenis_ob'     => $request->jenis_ob,
            'stok_ob'     => $request->stok_ob,
            'harga_ob'     => $request->harga_ob,
            
        ]);

        //redirect to index
        return redirect()->route('apoteks.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }

        /**
         * edit
         *
         * @param  mixed $post
         * @return void
         */
    public function edit(Apotek $apotek)
    {
            return view('apoteks.edit', compact('apotek'));
        }
        
        /**
         * update
         */
        public function update(Request $request, Apotek $apotek)
        {
            //validate form
            $this->validate($request, [
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nama_ob'   => 'required|min:5',
                'jenis_ob'  => 'required|min:5',
                'stok_ob'   => 'required|numeric',
                'harga_ob'  => 'required|numeric'
            ]);

            //check if image is uploaded
            if ($request->hasFile('image')) {

                //upload new image
                $image = $request->file('image');
                $image->storeAs('public/apoteks', $image->hashName());

                //delete old image
                Storage::delete('public/apoteks/'.$apotek->image);

                //update post with new image
                $apotek->update([
                    'image'     => $image->hashName(),
                    'nama_ob'   => $request->nama_ob,
                    'jenis_ob'  => $request->jenis_ob,
                    'stok_ob'   => $request->stok_ob,
                    'harga_ob'  => $request->harga_ob
                ]);

            } else {

                //update post without image
                $apotek->update([
                    'nama_ob'   => $request->nama_ob,
                    'jenis_ob'  => $request->jenis_ob,
                    'stok_ob'   => $request->stok_ob,
                    'harga_ob'  => $request->harga_ob
                ]);
            }

            //redirect to index
            return redirect()->route('apoteks.index')->with(['success' => 'Data Berhasil Diubah!']);
        }
            /**
             * destroy
             *
             * @param  mixed $post
             * @return void
             */
            public function destroy(Apotek $apotek)
            {
                //delete image
                Storage::delete('public/apoteks/'. $apotek->image);

                //delete post
                $apotek->delete();

                //redirect to index
                return redirect()->route('apoteks.index')->with(['success' => 'Data Berhasil Dihapus!']);
            }
}
