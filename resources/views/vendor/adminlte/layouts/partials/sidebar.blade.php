<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
           <!-- <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
             Optionally, you can add icons to the links 
            <li class="active"><a href="{{ url('receitas/create') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>-->
            <li class="treeview">
                <a href="#"><i class='fa fa-money'></i> <span>{{-- {{ trans('adminlte_lang::message.multilevel') }} --}}Receitas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="receitas">Receitas Normais{{-- {{ trans('adminlte_lang::message.linklevel2') }} --}}</a></li>
                    <li><a href="receitasfuturas">Receitas Futuras{{-- {{ trans('adminlte_lang::message.linklevel2') }} --}}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-book'></i> <span>{{-- {{ trans('adminlte_lang::message.multilevel') }} --}}Despesas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="despesas">Despesas Normais{{-- {{ trans('adminlte_lang::message.linklevel2') }} --}}</a></li>
                    <li><a href="despesasfuturas">Despesas Futuras{{-- {{ trans('adminlte_lang::message.linklevel2') }} --}}</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>{{-- {{ trans('adminlte_lang::message.multilevel') }} --}}Perfis</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="perfis">Perfil Receitas {{-- {{ trans('adminlte_lang::message.linklevel2') }} --}}</a></li>
                    <li><a href="perfisdespesas">Perfil Despesas{{-- {{ trans('adminlte_lang::message.linklevel2') }} --}}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
