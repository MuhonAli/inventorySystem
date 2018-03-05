@extends('layouts.layout')

@section('content')

<section id="courseArchive">
      <div class="container">
        <div class="row">
          <!-- start course content -->
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="courseArchive_content">
              <!-- start blog archive  -->
              <div class="row">
                <!-- start single blog -->
                <div class="col-lg-12 col-12 col-sm-12">
                  <div class="single_blog">
                    <div class="blogimg_container">
                      <a href="#" class="blog_img">
                        <img alt="img" src="img/blog2.jpg">
                      </a>
                    </div>
                    <h2 class="blog_title"><a href="blog-single.html">Informations</a></h2>
                    <div class="blog_commentbox">
                      <p>Sylhet Engineering College (SEC) established in the year 2007 under the School of Applied Sciences & Technology, Shahjalal University of Science and Technology.</p>
                      <p><i class="fa fa-calendar"></i>The Sylhet Engineering College (SEC) campus is located at Tilagarh, approximately six kilometers away from the heart of Sylhet city. SEC has three large academic buildings, library and computer building, administrative building, the principal's residence, teachers and staff quarters. There are two male hostels and a female hostel for students.</p></br>
                     
                    </div>
                    <h3>Lab facilities:</h3>

Sylhet Engineering College has sufficient instruments in its lab which is modern, updated and well equipped. Here students are getting the benefits of the following lab :-<br><br>

Department of Computer Science and Engineering (CSE)<br>
01. Networking Lab

02.Communication & Microprocessor Lab

03. Central Computer Center Lab

04. Computer Lab

05. Microprocessor Lab

06. Software Lab

07. ACM lab<br><br>

Department of Electrical and Electronic Engineering (EEE):<br>
01. Electronics Lab

02. Electrical Circuit Lab

03. Electrical Machine Lab

04. Power System & Hyvoltage Lab

05. Digital Singnal Processing Lab

06. Structural Machine Lab<br><br>

Department of Civil Engineering (CE):<br>
01. Machine Shop

02. Welding Shop

03. Surveying Shop

04. Foundry Shop

05. Transportation Lab

06. Drawing Laboratory

07. Hydraulics Lab

08. Wood Shop

09. Environment Lab

10. Geo- Technical Lab</p>

                    <h3>Hall Facilities</h3>
                   
                   <p>The hall facility of Sylhet Engineering College is well known. There are 3 residential halls (5 stories hall each). Two halls for boys & 1 hall for ladies. These are listed below with their capacities:</p>                    
                  </div>                 
                </div>
                <!-- End single blog -->                
              </div>
              <!-- end blog archive  -->                       
            </div>
          </div>
          <!-- End course content -->

          <!-- start course archive sidebar -->
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="courseArchive_sidebar">
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Recent Program<span class="fa fa-angle-double-right"></span></h2>
                <ul class="news_tab">
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#" class="news_img">
                          <img alt="img" src="img/news.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="#">Pahela Boishakh Celebration</a>
                       <span class="feed_date">14.4.17</span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#" class="news_img">
                          <img alt="img" src="img/news.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="#">Workshop on Carrier Build up</a>
                       <span class="feed_date">28.02.17</span>                
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <a href="#" class="news_img">
                          <img alt="img" src="img/news.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                       <a href="#">Independent day Program</a>
                       <span class="feed_date">26.03.17</span>                
                      </div>
                    </div>
                  </li>                  
                </ul>
              </div>
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Department <span class="fa fa-angle-double-right"></span></h2>
                <ul>
                  <li><a href="#">CSE</a></li>
                  <li><a href="#">EEE</a></li>
                  <li><a href="#">CE</a></li>
                  
                </ul>
              </div>
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>Building <span class="fa fa-angle-double-right"></span></h2>
                <ul class="tags_nav">
                  <li><a href="#"><i class="fa fa-tags"></i>Administraion</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>Library</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>CSE</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>EEE</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i>CE</a></li>
                  
                </ul>
              </div>
              <!-- End single sidebar -->
              <!-- start single sidebar -->
              <div class="single_sidebar">
                <h2>News<span class="fa fa-angle-double-right"></span></h2>
               <ul>
                  <li><a href="#">Admision Test</a></li>
                  <li><a href="#">Debate competition</a></li>
                  <li><a href="#">Notice about re-admssion</a></li>
                  <li><a href="#">Masters Program</a></li>
                  
                </ul>
              </div>
              <!-- End single sidebar -->
            </div>
          </div>
          <!-- start course archive sidebar -->
        </div>
      </div>
    </section>

    @endsection