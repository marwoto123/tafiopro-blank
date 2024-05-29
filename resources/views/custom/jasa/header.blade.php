        <div class="row hdr-nav-bar">
                        <div class="col-md-12">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="navbar-brand hidden-lg-up">order Menu</a>
                                <a class="navbar-toggler">
                                <span class="ti-menu" data-toggle="collapse" data-target="#navbarText"></span>
                              </a>
                                <div class="collapse navbar-collapse" id="navbarText">
                                    <ul class="navbar-nav mr-auto">
                                        <!-- Nav item -->

                                        <li class="nav-item ">

                                            <h2 >Order detail</h2>
                                        </li>

                                    </ul>

                                    <ul class="list-inline m-r-40 p-t-20">
                                  <li>
                                        <div class="d-flex">
                                          <i class="fa fa-circle font-10 m-r-5 text-success m-t-5"></i>
                                          <div><h6 class="text-muted m-b-0">klien</h6>
                                            <h4 class="m-t-0">

                                    {!! $dataModel->klien->perusahaanar !!}
                                            </h4>
                                            </div>
                                          </div>
                                        </li>
                                      <li>
                                        <div class="d-flex">
                                          <i class="fa fa-circle font-10 m-r-5 text-muted m-t-5"></i>
                                          <div><h6 class="text-muted m-b-0">sub total</h6>
                                            <h4 class="m-t-0">{!! uang($dataModel->total-$dataModel->ongkir-$dataModel->diskon) !!}</h4>
                                            </div>
                                          </div>
                                        </li>
                                      <li>
                                        <div class="d-flex">
                                          <i class="fa fa-circle font-10 m-r-5 text-warning m-t-5"></i>
                                          <div><h6 class="text-muted m-b-0">ongkir</h6>
                                            <H4 class="m-t-0">{!! uang($dataModel->ongkir) !!}</H4>
                                            </div>
                                          </div>
                                        </li>
                                      <li>
                                        <div class="d-flex">
                                          <i class="fa fa-circle font-10 m-r-5 text-primary m-t-5"></i>
                                          <div><h6 class="text-muted m-b-0">diskon</h6>
                                            <H4 class="m-t-0">{!! !empty($dataModel->diskon)?uang($dataModel->diskon):0 !!}</H4>
                                            </div>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="d-flex">
                                            <i class="fa fa-circle font-10 m-r-5 text-info m-t-5"></i>
                                            <div><h6 class="text-muted m-b-0">total</h6>
                                              <H4 class="m-t-0">{!! uang($dataModel->total) !!}</H4>
                                              </div>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="d-flex">
                                              <i class="fa fa-circle font-10 m-r-10 text-danger m-t-5"></i>
                                              <div>
                                                    <h6 class="text-muted m-b-0">pembayaran</h6>
                                                <H4 class="m-t-0">{!! !empty($dataModel->diskon)?uang($dataModel->diskon):0 !!}</H4>
                                    </div>
                                              </div>
                                            </li>
                                          </ul>


                                    <div class="call-to-act">
@if(cek_alamat("project.detail.create"))
    {!!button_tambah('project/'.$dataModel->id . '/detail/create')!!}
@endif
@if(cek_alamat("project.invoice"))
<a  class='m-r-5'
onclick="window.open('{!! url('project/'.$dataModel->id.'/invoice')!!}', '_blank', 'width=1000,height=600,scrollbars=yes,menubar=no,status=no,resizable=yes,screenx=0,screeny=0')"
   ><button type='button' class='btn btn-success btn-rounded'>invoice</button></a>
@endif
                                    </div>
                                </div>
                            </nav>
                        </div>

                    </div>
