<?php $menus = \Illuminate\Support\Facades\Config::get('backendmenu.menus');?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      @foreach($menus as $key => $value)
            <?php $flag = false; $mainPer = false; ?>
            
                <?php $mainPer = true; ?>

                @if(is_array($value['child']))
                        <?php $mainPer = false; ?>
                    @foreach($value['child'] as $k => $v)
                        @if(Request::path() == $v['slug'])  <?php $flag = true; ?> @endif

                        
                            <?php $mainPer = true; ?>
                       
                    @endforeach
                @endif

                @if($mainPer)
                    <li @if(is_array($value['child'])) class="treeview @if($flag) active @endif" @endif>
                        <a href="{!! URL::to($value['slug']) !!}"
                           class="app-menu__item @if(Request::path() == $value['slug']) active @endif"
                           @if(is_array($value['child'])) data-toggle="treeview" @endif>
                            <i class="{!! $value['icon-class'] !!}"></i>&nbsp;&nbsp;
                            <span class="app-menu__label">{!! $value['Name'] !!}</span>
                            @if($value['child'] != "" && count($value['child'])>1)
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                            @endif
                        </a>
                        @if(is_array($value['child']))

                            <ul class="treeview-menu">
                                @foreach($value['child'] as $k => $v)
                                    
                                        <li>
                                            <a href="{!! URL::to($v['slug']) !!}"
                                               class="treeview-item @if(Request::path() == $v['slug']) active @endif">
                                                <i class="{!! $v['icon-class'] !!}"></i>&nbsp;{!! $v["Name"] !!}
                                            </a>
                                        </li>
                                   
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif

        @endforeach
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>