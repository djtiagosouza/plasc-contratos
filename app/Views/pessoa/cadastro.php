<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">

<!--Page Title-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="page-title">
    <h1 class="page-header text-overflow">Cadastro de pessoa</h1>

    <!--Searchbox-->
    <div class="searchbox">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search..">
            <span class="input-group-btn">
                <button class="text-muted" type="button"><i class="demo-pli-magnifi-glass"></i></button>
            </span>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End page title-->


<!--Breadcrumb-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Pages</a></li>
    <li class="active">Blank page</li>
</ol>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End breadcrumb-->




<!--Page content-->
<!--===================================================-->
<div id="page-content">
    
<div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Horizontal form</h3>
					            </div>
					
					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?php echo $url_base?>/pessoa/cadastrar">
					                <div class="panel-body">
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Nome</label>
					                        <div class="col-sm-9">
					                            <input type="text" name="nome" placeholder="Nome" id="demo-hor-inputemail" class="form-control">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Email</label>
					                        <div class="col-sm-9">
					                            <input type="text" name="email" placeholder="Email" id="demo-hor-inputemail" class="form-control">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Idade</label>
					                        <div class="col-sm-9">
					                            <input type="text" name="idade" placeholder="Idade" id="demo-hor-inputemail" class="form-control">
					                        </div>
					                    </div>
					                    
					                </div>
					                <div class="panel-footer text-right">
					                    <button class="btn btn-success" type="submit">Cadastrar</button>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Horizontal Form-->
					
					        </div>
					    </div>
    
</div>
<!--===================================================-->
<!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->