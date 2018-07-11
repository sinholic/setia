<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataBIController extends Controller
{
    public function index(Request $request)
    {
      $url="https://10.251.94.146:2112/apps/dashboard/index.html?siteId=5aa675119a6cb60e80886899&objectId=5aa8f179c250011114d63066&action=open&selfOpen=1&accessToken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHBpcmF0aW9uIjoxNTMyNDE0NDA5NDIzLCJyZW1lbWJlciI6dHJ1ZSwidXNlck5hbWUiOiJWaWV3MyIsInVzZXJJZCI6IjVhZjAyYmJjNzliZWE3MDYyODFhMWRlMCIsInNlc3Npb25JZCI6ImYzZjU1MmNiOGNhM2E3OWVhZTcwMmE2NmM1ZTZiYjU3YjAwZDgyY2RkMGRkYWU2YWYxYzMyMDM2MmZkN2YzMzEiLCJmaXJzdE5hbWUiOiJWaWV3MyIsImxhc3ROYW1lIjoiVmlldzMiLCJlbWFpbCI6IiIsInNpdGVJZCI6IjVhYTY3NTExOWE2Y2I2MGU4MDg4Njg5OSJ9.C2u9qlAXm1YaoJgn6VOEpWh6rdUps6B_DgNLfd1V1dU&l=1";
        return view('frontend.roamingpartnermap', compact('url'));
    }
    public function handset(Request $request)
    {
      $url="https://10.251.94.146:2112/apps/report/index.html?siteId=5aa675119a6cb60e80886899&objectId=5abc91c1a64ce911e0111c06&action=open&selfOpen=1&accessToken=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHBpcmF0aW9uIjoxNTMyNDE3Nzg3NjE4LCJyZW1lbWJlciI6dHJ1ZSwidXNlck5hbWUiOiJWaWV3MTEiLCJ1c2VySWQiOiI1YWYxNDUyZTc5YmVhNzA2MjgxYTFmMGYiLCJzZXNzaW9uSWQiOiIyZmViNTdjMGIxMzJjMmFlMTIyNDE2NmZhMzBjNzEzYWM5NWJmMmQzM2Q0NzExN2RlZjQwZTlkYWMxOGIzZDIwIiwiZmlyc3ROYW1lIjoiVmlldzExIiwibGFzdE5hbWUiOiJWaWV3MTEiLCJlbWFpbCI6IiIsInNpdGVJZCI6IjVhYTY3NTExOWE2Y2I2MGU4MDg4Njg5OSJ9.qpXqlYwqGwsHo2yBVG2ASqnReXqLdgT66y0_t0hh7go&l=1";
        return view('frontend.handset', compact('url'));
    }

}
