<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 07-Oct-17
 * Time: 6:19 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Job Post')

@section('content')

    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Job Post</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if($errors->has())
                    <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}</br>
                    @endforeach
                    </div>
                @endif
                <form enctype="multipart/form-data" action="{{route('joabPost')}}" method="post" class="reg-page">

                    {{csrf_field()}}
                    <div class="reg-header">
                        <h2>Fill Up the Bellow Field to Post a New Job</h2>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Job title <span class="color-red">*</span></label>
                            <input value="{{old('title')}}"  type="text" class="form-control margin-bottom-20" name="title">
                        </div>
                        <div class="col-sm-6">
                        <label>Category<span class="color-red">*</span></label>
                                <select class="form-control margin-bottom-20" name="category">
                                    <option value="">Select One</option>
                                    <option value="1">Web development</option>
                                    <option value="2">Mobile App Development</option>
                                    
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Duration<span class="color-red">*</span></label>
                            <input value="{{old('duration')}}"  type="number" class="form-control margin-bottom-20" name="duration">
                        </div>
                        <div class="col-sm-6">
                            <label >Sub Category <span class="color-red">*</span></label>
                                <select class="form-control margin-bottom-20" name="subCategory" disabled="disabled">
                                    <option value="">Select One</option>
                                    <option value="">Select1</option>
                                    <option value="">Select2</option>
                                    
                                </select>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-sm-6">
                            <label>Project Cost <span class="color-red">*</span></label>
                            <input value="{{old('projectCost')}}" type="number" name="projectCost" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Project Type <span class="color-red">*</span></label>
                            <select class="form-control margin-bottom-20" name="projectType">
                                    <option value="">Select One</option>
                                    <option value="1">One Time Project</option>
                                    <option value="2">On going</option>
                                    <option value="3">I don't know</option>
                            </select>
                        </div>
                    </div>

                    <label>Skills <span class="color-red">*</span></label>
                        <select value="{{old('skill[]')}}" id="skill" name="skill[]" multiple  class="form-control margin-bottom-20">
                        </select>

                    <label>Job Description</label>
                    <textarea class="form-control margin-bottom-20" rows="4" name="description">{{old('description')}}</textarea>

                    
                    <label>job Attachment</label>
                   {{-- <div class="col-md-6 form-control margin-bottom-20 dropzone"  action="/fileupload">

                        <div class="fallback">--}}
                            <input class="form-control" name="file[]" type="file"  multiple />
                          {{--</div>
                    </div>--}}
                        
                        <!--Top-->
                    {{-- start div for selected freelancer list and add js hidden input type --}}

                    <div class="row">
                        <div class="col-md-12 margin-top-20" id="freelancer_list">

                        </div>
                    </div>
                    {{--end div for selected freelancer list and add js hidden input type --}}
                    
                    <div class="panel panel-grey margin-bottom-40" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-globe"></i> Top Rated Freelancer</h3>
                        </div>
                        <div class="panel-body">
                            {{--<table class="table table-bordered">--}}
                                {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>#</th>--}}
                                        {{--<th>Username</th>--}}
                                        {{--<th>Skill</th>--}}
                                        {{--<th>Hourly Rate</th>--}}
                                        {{--<th>Options</th>--}}
                                    {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                    {{--<tr id="1_top_freelancer">--}}
                                        {{--<td>1</td>--}}
                                        {{--<td id="1_username">Mark</td>--}}
                                        {{--<td class="hidden-sm">Otto</td>--}}

                                        {{--<td>Active/Inactive</td>--}}
                                        {{--<td>--}}
                                            {{--<button type="button" onclick="getFreelancer(1)" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr id="2_top_freelancer">--}}
                                        {{--<td>2</td>--}}
                                        {{--<td id="2_username">Jacob</td>--}}
                                        {{--<td class="hidden-sm">Thornton</td>--}}

                                        {{--<td>Active/Inactive</td>--}}
                                        {{--<td><button onclick="getFreelancer(2)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr id="3_top_freelancer">--}}
                                        {{--<td>3</td>--}}
                                        {{--<td id="3_username">Larry</td>--}}
                                        {{--<td class="hidden-sm">the Bird</td>--}}

                                        {{--<td>Active/Inactive</td>--}}
                                        {{--<td><button onclick="getFreelancer(3)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr id="4_top_freelancer">--}}
                                        {{--<td>4</td>--}}
                                        {{--<td id="4_username">htmlstream</td>--}}
                                        {{--<td class="hidden-sm">Web Design</td>--}}

                                        {{--<td>Active/Inactive</td>--}}
                                        {{--<td><button onclick="getFreelancer(4)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012/08/06</td>
                                    <td>$137,500</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010/10/14</td>
                                    <td>$327,900</td>
                                </tr>
                                <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009/09/15</td>
                                    <td>$205,500</td>
                                </tr>
                                <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                    <td>2008/12/13</td>
                                    <td>$103,600</td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>30</td>
                                    <td>2008/12/19</td>
                                    <td>$90,560</td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2013/03/03</td>
                                    <td>$342,000</td>
                                </tr>
                                <tr>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>36</td>
                                    <td>2008/10/16</td>
                                    <td>$470,600</td>
                                </tr>
                                <tr>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>43</td>
                                    <td>2012/12/18</td>
                                    <td>$313,500</td>
                                </tr>
                                <tr>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>19</td>
                                    <td>2010/03/17</td>
                                    <td>$385,750</td>
                                </tr>
                                <tr>
                                    <td>Michael Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>London</td>
                                    <td>66</td>
                                    <td>2012/11/27</td>
                                    <td>$198,500</td>
                                </tr>
                                <tr>
                                    <td>Paul Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td>New York</td>
                                    <td>64</td>
                                    <td>2010/06/09</td>
                                    <td>$725,000</td>
                                </tr>
                                <tr>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>59</td>
                                    <td>2009/04/10</td>
                                    <td>$237,500</td>
                                </tr>
                                <tr>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>41</td>
                                    <td>2012/10/13</td>
                                    <td>$132,000</td>
                                </tr>
                                <tr>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>35</td>
                                    <td>2012/09/26</td>
                                    <td>$217,500</td>
                                </tr>
                                <tr>
                                    <td>Jenette Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>New York</td>
                                    <td>30</td>
                                    <td>2011/09/03</td>
                                    <td>$345,000</td>
                                </tr>
                                <tr>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td>40</td>
                                    <td>2009/06/25</td>
                                    <td>$675,000</td>
                                </tr>
                                <tr>
                                    <td>Caesar Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td>21</td>
                                    <td>2011/12/12</td>
                                    <td>$106,450</td>
                                </tr>
                                <tr>
                                    <td>Doris Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>Sidney</td>
                                    <td>23</td>
                                    <td>2010/09/20</td>
                                    <td>$85,600</td>
                                </tr>
                                <tr>
                                    <td>Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2009/10/09</td>
                                    <td>$1,200,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Joyce</td>
                                    <td>Developer</td>
                                    <td>Edinburgh</td>
                                    <td>42</td>
                                    <td>2010/12/22</td>
                                    <td>$92,575</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Chang</td>
                                    <td>Regional Director</td>
                                    <td>Singapore</td>
                                    <td>28</td>
                                    <td>2010/11/14</td>
                                    <td>$357,650</td>
                                </tr>
                                <tr>
                                    <td>Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>28</td>
                                    <td>2011/06/07</td>
                                    <td>$206,850</td>
                                </tr>
                                <tr>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>48</td>
                                    <td>2010/03/11</td>
                                    <td>$850,000</td>
                                </tr>
                                <tr>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Tokyo</td>
                                    <td>20</td>
                                    <td>2011/08/14</td>
                                    <td>$163,000</td>
                                </tr>
                                <tr>
                                    <td>Michelle House</td>
                                    <td>Integration Specialist</td>
                                    <td>Sidney</td>
                                    <td>37</td>
                                    <td>2011/06/02</td>
                                    <td>$95,400</td>
                                </tr>
                                <tr>
                                    <td>Suki Burks</td>
                                    <td>Developer</td>
                                    <td>London</td>
                                    <td>53</td>
                                    <td>2009/10/22</td>
                                    <td>$114,500</td>
                                </tr>
                                <tr>
                                    <td>Prescott Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>London</td>
                                    <td>27</td>
                                    <td>2011/05/07</td>
                                    <td>$145,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Cortez</td>
                                    <td>Team Leader</td>
                                    <td>San Francisco</td>
                                    <td>22</td>
                                    <td>2008/10/26</td>
                                    <td>$235,500</td>
                                </tr>
                                <tr>
                                    <td>Martena Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>Edinburgh</td>
                                    <td>46</td>
                                    <td>2011/03/09</td>
                                    <td>$324,050</td>
                                </tr>
                                <tr>
                                    <td>Unity Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009/12/09</td>
                                    <td>$85,675</td>
                                </tr>
                                <tr>
                                    <td>Howard Hatfield</td>
                                    <td>Office Manager</td>
                                    <td>San Francisco</td>
                                    <td>51</td>
                                    <td>2008/12/16</td>
                                    <td>$164,500</td>
                                </tr>
                                <tr>
                                    <td>Hope Fuentes</td>
                                    <td>Secretary</td>
                                    <td>San Francisco</td>
                                    <td>41</td>
                                    <td>2010/02/12</td>
                                    <td>$109,850</td>
                                </tr>
                                <tr>
                                    <td>Vivian Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>San Francisco</td>
                                    <td>62</td>
                                    <td>2009/02/14</td>
                                    <td>$452,500</td>
                                </tr>
                                <tr>
                                    <td>Timothy Mooney</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>37</td>
                                    <td>2008/12/11</td>
                                    <td>$136,200</td>
                                </tr>
                                <tr>
                                    <td>Jackson Bradshaw</td>
                                    <td>Director</td>
                                    <td>New York</td>
                                    <td>65</td>
                                    <td>2008/09/26</td>
                                    <td>$645,750</td>
                                </tr>
                                <tr>
                                    <td>Olivia Liang</td>
                                    <td>Support Engineer</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2011/02/03</td>
                                    <td>$234,500</td>
                                </tr>
                                <tr>
                                    <td>Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>38</td>
                                    <td>2011/05/03</td>
                                    <td>$163,500</td>
                                </tr>
                                <tr>
                                    <td>Sakura Yamamoto</td>
                                    <td>Support Engineer</td>
                                    <td>Tokyo</td>
                                    <td>37</td>
                                    <td>2009/08/19</td>
                                    <td>$139,575</td>
                                </tr>
                                <tr>
                                    <td>Thor Walton</td>
                                    <td>Developer</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2013/08/11</td>
                                    <td>$98,540</td>
                                </tr>
                                <tr>
                                    <td>Finn Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009/07/07</td>
                                    <td>$87,500</td>
                                </tr>
                                <tr>
                                    <td>Serge Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2012/04/09</td>
                                    <td>$138,575</td>
                                </tr>
                                <tr>
                                    <td>Zenaida Frank</td>
                                    <td>Software Engineer</td>
                                    <td>New York</td>
                                    <td>63</td>
                                    <td>2010/01/04</td>
                                    <td>$125,250</td>
                                </tr>
                                <tr>
                                    <td>Zorita Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>56</td>
                                    <td>2012/06/01</td>
                                    <td>$115,000</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>43</td>
                                    <td>2013/02/01</td>
                                    <td>$75,650</td>
                                </tr>
                                <tr>
                                    <td>Cara Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td>46</td>
                                    <td>2011/12/06</td>
                                    <td>$145,600</td>
                                </tr>
                                <tr>
                                    <td>Hermione Butler</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2011/03/21</td>
                                    <td>$356,250</td>
                                </tr>
                                <tr>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>21</td>
                                    <td>2009/02/27</td>
                                    <td>$103,500</td>
                                </tr>
                                <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>30</td>
                                    <td>2010/07/14</td>
                                    <td>$86,500</td>
                                </tr>
                                <tr>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>51</td>
                                    <td>2008/11/13</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011/06/27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End Top-->

                    {{-- start div for selected freelancer list and add js hidden input type --}}

                    <div class="row">
                        <div class="col-md-12" id="inter_freelancer_list">

                        </div>
                    </div>
                {{--end div for selected freelancer list and add js hidden input type --}}
                    <!--Top-->

                    <div class="col-md-5 col-md-offset-7">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Intermediate Freelancer">
                            <span class="input-group-btn">
                                <button type="button" class="btn-u" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>

                    <div class="panel panel-grey margin-bottom-40" >
                        <div class="panel-heading">



                            <h3 class="panel-title"><i class="fa fa-globe"></i> Intermediate Freelancer</h3>
                        </div>
                        <div class="panel-body" style="height: 200px; width: 880px; overflow: scroll;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr id="">
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Skill</th>
                                        <th>Hourly Rate</th>  
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="1_inter_freelancer">
                                        <td>1</td>
                                        <td id="1_username_inter">Mark</td>
                                        <td class="hidden-sm">Otto</td>
                                        
                                        <td>Active/Inactive</td>
                                        <td><button type="button" onclick="getInterFreelancer(1)" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr id="2_inter_freelancer">
                                        <td>2</td>
                                        <td id="2_username_inter">Jacob</td>
                                        <td class="hidden-sm">Thornton</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button type="button" onclick="getInterFreelancer(2)" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr id="3_inter_freelancer">
                                        <td>3</td>
                                        <td id="3_username_inter">Larry</td>
                                        <td class="hidden-sm">the Bird</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" onclick="getInterFreelancer(3)" type="button" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr id="4_inter_freelancer">
                                        <td>4</td>
                                        <td id="4_username_inter">htmlstream</td>
                                        <td class="hidden-sm">Web Design</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button type="button" onclick="getInterFreelancer(4)" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End Top-->
                    <hr>

                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn-u" type="submit">Confirm Job Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        $("#skill").select2({
            tags: true,
            tokenSeparators: [',', '.']
        });

    </script>

    {{--This script add by polash for add freelancer list--}}
    <script type="text/javascript">

        function getFreelancer(id){
        var input_field =   '<input id="freelancer_id_list_'+id+'" value="'+id+'" type="hidden" name="freelancer_list[]">';
        var username = $("#"+id+"_username").text();
        var add_style = '<b id="top_level_freelancer'+id+'" class="make_border">'+username+'<button type="button" class="remover" onclick="removeFreelancer('+id+')" aria-hidden="true">×</button></b>';
            $("#freelancer_list").append(input_field);

            $("#freelancer_list").append(add_style);
            $( "#"+id+"_top_freelancer" ).addClass( "hidden" );
        }

        function getInterFreelancer(id){

            var input_field =   '<input id="inter_freelancer_list_id'+id+'" value="'+id+'" type="hidden" name="inter_freelancer_list[]">';
            var username = $("#"+id+"_username_inter").text();
            var add_style = '<b id="int_level_freelancer'+id+'" class="make_border">'+username+'<button type="button" class="remover" onclick="removeInterFreelancer('+id+')" aria-hidden="true">×</button></b>';

            $( "#"+id+"_inter_freelancer" ).addClass( "hidden" );
            $("#inter_freelancer_list").append(input_field);

            $("#inter_freelancer_list").append(add_style);


        }
        function removeInterFreelancer(id){
            $( "#"+id+"_inter_freelancer" ).removeClass( "hidden" );
            $( "#inter_freelancer_list_id"+id ).remove();
            $( "#int_level_freelancer"+id ).remove();
        }
        function removeFreelancer(id){
            $( "#"+id+"_top_freelancer" ).removeClass( "hidden" );
            $( "#freelancer_id_list_"+id ).remove();
            $( "#top_level_freelancer"+id ).remove();
        }
    </script>
@endsection
