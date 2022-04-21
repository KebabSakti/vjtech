<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Portfolio;
use App\Models\Tag;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class AdminPortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Portfolio = Portfolio::with(['tag', 'gallery'])->orderBy('updated_at', 'desc')->get();

        return view('admin.portfolio.index', ['data' => $Portfolio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Tag = Tag::all();

        return view('admin.portfolio.create', ['tag' => $Tag]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag_id' => 'required',
            'project_name' => 'required',
            'thumb' => 'required',
        ]);

        //upload thumb portfolio
        Cloudder::upload($request->thumb, null, array("quality" => "auto:eco"), null);
        $thumbClouderId = Cloudder::getPublicId();

        //simpan data portfolio
        $Portfolio = new Portfolio;
        $Portfolio->tag_id = $request->tag_id;
        $Portfolio->clouder_id = $thumbClouderId;
        $Portfolio->project_name = $request->project_name;
        $Portfolio->save();

        //upload ss dan smpan ke db
        for ($i = 0; $i < count($request->ss); $i++) {
            //upload
            Cloudder::upload($request->ss[$i], null, array("quality" => "auto:eco"), null);
            $SsClouderId = Cloudder::getPublicId();

            //simpan data SS di db
            $Gallery = new Gallery;
            $Gallery->portfolio_id = $Portfolio->id;
            $Gallery->clouder_id = $SsClouderId;
            $Gallery->save();
        }

        return redirect()->route('portfolio.index')->with('alert', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Portfolio = Portfolio::with('tag')->find($id);
        $Gallery = Gallery::where('portfolio_id', $id)->get();
        $Tag = Tag::all();

        if ($Portfolio == null) {
            return redirect()->route('portfolio.index')->with('alert', 'Data tidak ditemukan');
        }

        return view('admin.portfolio.edit', ['data' => $Portfolio, 'gallery' => $Gallery, 'tag' => $Tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tag_id' => 'required',
            'project_name' => 'required',
        ]);

        $Portfolio = Portfolio::find($id);

        if ($Portfolio == null) {
            return redirect()->route('portfolio.index')->with('alert', 'Data tidak ditemukan');
        }

        $Portfolio->tag_id = $request->tag_id;
        $Portfolio->project_name = $request->project_name;

        if (!empty($request->thumb)) {
            //hapus thumbnail lama
            Cloudder::destroyImage();

            //upload thumbnail baru
            Cloudder::upload($request->thumb, null, array("quality" => "auto:eco"), null);

            //simpan di db
            $Portfolio->clouder_id = Cloudder::getPublicId();
        }

        $Portfolio->save();

        if (!empty($request->ss)) {
            //upload ss dan simpan ke db
            for ($i = 0; $i < count($request->ss); $i++) {
                //upload
                Cloudder::upload($request->ss[$i], null, array("quality" => "auto:eco"), null);
                $SsClouderId = Cloudder::getPublicId();

                //simpan data SS di db
                $Gallery = new Gallery;
                $Gallery->portfolio_id = $Portfolio->id;
                $Gallery->clouder_id = $SsClouderId;
                $Gallery->save();
            }
        }

        return redirect()->route('portfolio.index')->with('alert', 'Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Portfolio = Portfolio::find($id);

        if ($Portfolio == null) {
            return redirect()->route('portfolio.index')->with('alert', 'Data tidak ditemukan');
        }

        //hapus gambar di clouder
        Cloudder::destroyImage($Portfolio->clouder_id);

        $Gallery = Gallery::where('portfolio_id', $id)->get();
        foreach ($Gallery as $gallery) {
            Cloudder::destroyImage($gallery->clouder_id);

            $gallery->delete();
        }

        $Portfolio->delete();

        return redirect()->route('portfolio.index')->with('alert', 'Data berhasil dihapus');
    }
}
