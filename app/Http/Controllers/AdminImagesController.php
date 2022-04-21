<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use JD\Cloudder\Facades\Cloudder;

class AdminImagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $Gallery = Gallery::find($id);

        if ($Gallery == null) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'data' => '',
            ]);
        }

        //Hapus foto di cloudder
        Cloudder::destroyImage($Gallery->clouder_id);

        //hapus foto di database
        $Gallery->delete();

        return response()->json([
            'status' => true,
            'message' => 'File berhasil dihapus',
            'data' => '',
        ]);
    }
}
