        <style type="text/css">
            /* ————————————————————–
              Tree core styles
            */
            .tree { margin: 1em; }

            .tree input {
              position: absolute;
              clip: rect(0, 0, 0, 0);
              }

            .tree input ~ ul { display: none; }

            .tree input:checked ~ ul { display: block; }

            /* ————————————————————–
              Tree rows
            */
            .tree li {
              line-height: 1.2;
              position: relative;
              padding: 0 0 1em 1em;
              }

            .tree ul li { padding: 1em 0 0 1em; }

            .tree > li:last-child { padding-bottom: 0; }

            /* ————————————————————–
              Tree labels
            */
            .tree_label {
              position: relative;
              display: inline-block;
              background: #fff;
              }

            label.tree_label { cursor: pointer; }

            label.tree_label:hover { color: #666; }

            /* ————————————————————–
              Tree expanded icon
            */
            label.tree_label:before {
              background: #000;
              color: #fff;
              position: relative;
              z-index: 1;
              float: left;
              margin: 0 1em 0 -2em;
              width: 1em;
              height: 1em;
              border-radius: 1em;
              content: '+';
              text-align: center;
              line-height: .9em;
              }

            :checked ~ label.tree_label:before { content: '–'; }

            /* ————————————————————–
              Tree branches
            */
            .tree li:before {
              position: absolute;
              top: 0;
              bottom: 0;
              left: -.5em;
              display: block;
              width: 0;
              border-left: 1px solid #777;
              content: "";
              }

            .tree_label:after {
              position: absolute;
              top: 0;
              left: -1.5em;
              display: block;
              height: 0.5em;
              width: 1em;
              border-bottom: 1px solid #777;
              border-left: 1px solid #777;
              border-radius: 0 0 0 .3em;
              content: '';
              }

            label.tree_label:after { border-bottom: 0; }

            :checked ~ label.tree_label:after {
              border-radius: 0 .3em 0 0;
              border-top: 1px solid #777;
              border-right: 1px solid #777;
              border-bottom: 0;
              border-left: 0;
              bottom: 0;
              top: 0.5em;
              height: auto;
              }

            .tree li:last-child:before {
              height: 1em;
              bottom: auto;
              }

            .tree > li:last-child:before { display: none; }

            .tree_custom {
              display: block;
              background: #eee;
              padding: 1em;
              border-radius: 0.3em;
            }
        </style>
        <script type="text/javascript">
            function isNumber(n) {
              return !isNaN(parseFloat(n)) && isFinite(n);
            }

            function setFontSize(el) {
                var fontSize = el.val();
                
                if ( isNumber(fontSize) && fontSize >= 0.5 ) {
                  $('body').css({ fontSize: fontSize + 'em' });
                } else if ( fontSize ) {
                  el.val('1');
                  $('body').css({ fontSize: '1em' });  
                }
            }

            $(function() {
              
              $('#fontSize')
                .bind('change', function(){ setFontSize($(this)); })
                .bind('keyup', function(e){
                  if (e.keyCode == 27) {
                    $(this).val('1');
                    $('body').css({ fontSize: '1em' });  
                  } else {
                    setFontSize($(this));
                  }
                });
              
              $(window)
                .bind('keyup', function(e){
                  if (e.keyCode == 27) {
                    $('#fontSize').val('1');
                    $('body').css({ fontSize: '1em' });  
                  }
                });
              
            });
        </script>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href='Edairy-Home'>E-diary Home</a>
                                        </li>
                                        <li class="breadcrumb-item active">Add-Dapartments</li>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <!-- <a class="btn btn-sm btn-primary" href="<?=base_url('Ediary-List-Department')?>"><i data-feather=briefcase class="align-self-center menu-icon"></i><span>&nbsp;List-Department</span></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="tree">
                                        <?php
                                            $i = 1;
                                            foreach($dept_design_list as $val){ ?>
                                      <li>
                                        <input type="checkbox" id="<?= $val["dept_id"]?>" />
                                        <label class="tree_label" for="<?= $val["dept_id"]?>">
                                            <?= $val['dept_name_hi']?>
                                        </label>                                        
                                        <ul>
                                            <?php foreach($val["designations"] as $designation){?>
                                            <li>                                                
                                                <label class="tree_label">
                                                    <?= $designation['designation_name_hindi']?>
                                                    <?= $designation['designation_name_eng']?>
                                                </label>
                                            </li>
                                            <?php }?>
                                        </ul>

                                      </li>

                                       <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
