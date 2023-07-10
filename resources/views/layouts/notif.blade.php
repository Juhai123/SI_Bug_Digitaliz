<li class="nav-item">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <i class="ri-notification-2-line"></i>
                              @if (Auth::User()->unreadNotifications->count())
                              <span class="bg-danger dots"></span>
                              @endif
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-danger p-3">
                                       <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">{{Auth::User()->unreadNotifications->count()}}</small></h5>
                                    </div>
                                    
                                    <ul class="suggestions-lists m-0 p-0">
                                       
                                    @if (Auth::user()->hasRole('programmer'))  
                                    $user = Auth::user();
                                    $notifications = $user->unreadNotifications;  
                                          @forelse ($notifications as $notification)
                                    <li class="iq-sub-card" href="#" >
                                    
                                       <div class="media align-items-center">
                                       <div class="">
                                             
                                          </div>
                                          <div class="media-body ml-1">
                                             <h6 class="mb-0 ">{{ $notification->data['title'] }}</h6>
                                             <small class="float-right font-size-11"><b>{{ $notification->created_at->format('H')}} hour ago</b></small>
                                             <small class="font-size-10 mb-0">You have task new, please check now. {{ $notification->data['message'] }} : {{ $notification->data['0'] }}</small>
                                          </div>
                                          
                                          </div>
                                          @if ($loop->last)
                            <a href="{{route('programmer.markNotification')}}" id="mark-all" class="text-center font-size-12">
                                Mark all as read
                            </a>
                        @endif
                    @empty
                        <a  id="" class="text-center font-size-13 ml-5">
                        There are no new notification
                            </a>
                    @endforelse
                    @else
                        You're logged in!
                    @endif
                                      
                                    </li>
                                    </ul>
                                    
                                 </div>
                              </div>
                           </div>
                        </li>
                       