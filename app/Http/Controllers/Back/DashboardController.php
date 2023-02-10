<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Project;
use App\Models\Team;
use Auth;
use Analytics;
use App\Models\Contact;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $data['total_akun'] = User::count();
        $data['total_artikel'] = Artikel::count();
        $data['total_project'] = Project::count();
        $data['total_team'] = Team::count();
        $data['total_contact'] = Contact::count();

        //retrieve visitors and pageview data for the current day and the last seven days

        // $data['total_visitors'] = Analytics::fetchVisitorsAndPageViews(Period::create(Carbon::now()->subYear(), Carbon::now()));

        // //retrieve visitors and pageviews since the 6 months ago
        // $data['top_browsers'] = Analytics::fetchTopBrowsers(Period::create(Carbon::now()->subYear(), Carbon::now()));

        // $data['user_types'] = Analytics::fetchUserTypes(Period::create(Carbon::now()->subYear(), Carbon::now()));

        //retrieve sessions and pageviews with yearMonth dimension since 1 year ago
        $data['devices'] = Analytics::performQuery(
            Period::create(Carbon::now()->subYear(), Carbon::now()),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions',
                'dimensions' => 'ga:operatingSystem,ga:operatingSystemVersion,ga:browser,ga:browserVersion'
            ]
        );

        $data['visitor_unique'] = Analytics::performQuery(
            Period::create(Carbon::now()->subYear(), Carbon::now()),
            'ga:users'
        );

        $page_views = Analytics::fetchVisitorsAndPageViews(Period::create(Carbon::now()->subYear(), Carbon::now()));
       
        $page_title = array();

        $home = 0;
        $about = 0;
        $project = 0;
        $team = 0;
        $contact = 0;

        $page_view_wrap = array();

        foreach($page_views as $key => $item) {
            if($item['pageTitle'] == "Tahungoding - Home") {
                $page_title['home'] = $item['pageTitle'];
                $home += $item['visitors'];
            } else if($item['pageTitle'] == "Tahungoding - About") {
                $page_title['about'] = $item['pageTitle'];
                $about += $item['visitors'];
            } else if($item['pageTitle'] == "Tahungoding - Project") {
                $page_title['project'] = $item['pageTitle'];
                $project += $item['visitors'];
            } else if($item['pageTitle'] == "Tahungoding - Team") {
                $page_title['team'] = $item['pageTitle'];
                $team += $item['visitors'];
            } else if($item['pageTitle'] == "Tahungoding - Contact") {
                $page_title['contact'] = $item['pageTitle'];
                $contact += $item['visitors'];
            }
        }

        foreach($page_title as $key => $item) {
            if($item == "Tahungoding - Home") {
                $page_view_wrap[$key]['pageTitle'] = $item;
                $page_view_wrap[$key]['visitors'] = $home;
            } else if($item == "Tahungoding - About") {
                $page_view_wrap[$key]['pageTitle'] = $item;
                $page_view_wrap[$key]['visitors'] = $about;
            } else if($item == "Tahungoding - Project") {
                $page_view_wrap[$key]['pageTitle'] = $item;
                $page_view_wrap[$key]['visitors'] = $project;
            } else if($item == "Tahungoding - Team") {
                $page_view_wrap[$key]['pageTitle'] = $item;
                $page_view_wrap[$key]['visitors'] = $team;
            } else if($item == "Tahungoding - Contact") {
                $page_view_wrap[$key]['pageTitle'] = $item;
                $page_view_wrap[$key]['visitors'] = $contact;
            }
        }

        return view('back.dashboard.data', $data, compact('page_view_wrap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
