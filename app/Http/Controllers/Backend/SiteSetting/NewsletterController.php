<?php

namespace App\Http\Controllers\Backend\SiteSetting;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NewsletterController extends Controller
{
    public function newsletter(Request $request)
    {
        $data['title'] = "Newsletter";

        if ($request->ajax()) {
            $newsletters = Newsletter::orderBy('created_at', 'desc');
            return DataTables::eloquent($newsletters)
                ->addIndexColumn()
                ->addColumn('email', function ($newsletter) {
                    return $newsletter->email;
                })
                ->addColumn('created_at', function ($newsletter) {
                    return Carbon::parse($newsletter->created_at)->diffForHumans();
                })
                ->addColumn('action', function ($newsletter) {
                    return '
                        <div class="dropdown text-right">
                            <button type="button" class="btn btn-info action-dropdown-btn">
                                <i class="ti-trash delete-btn" data-id="' . $newsletter->id . '"></i>
                            </button>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.site_setting.newsletter.list', $data);
    }


    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids');
        Newsletter::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }


    public function delete(Request $request)
    {
        $id = $request->input('id');
        Newsletter::find($id)->delete();
        return response()->json(['success' => true]);
    }
}
