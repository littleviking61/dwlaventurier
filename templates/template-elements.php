<?php
/*
Template Name: Elements
*/
?>

<?php get_template_part('templates/page', 'header'); ?>

<div class="dw-elements">
  <!-- grid -->
  <div class="table-row">
    <div class="col-md-12 grid">
      <div class="row">
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
        <div class="col-md-1">1</div>
      </div>
      <div class="row">
        <div class="col-md-8">8</div>
        <div class="col-md-4">4</div>
      </div>
      <div class="row">
        <div class="col-md-4">4</div>
        <div class="col-md-4">4</div>
        <div class="col-md-4">4</div>
      </div>
      <div class="row">
        <div class="col-md-6">6</div>
        <div class="col-md-6">6</div>
      </div>
    </div>
  </div>
  
  <div class="table-row">
    <!-- Heading -->
    <div class="col-md-6">
      <h1>h1. Bootstrap heading</h1>
      <h2>h2. Bootstrap heading</h2>
      <h3>h3. Bootstrap heading</h3>
      <h4>h4. Bootstrap heading</h4>
      <h5>h5. Bootstrap heading</h5>
      <h6>h6. Bootstrap heading</h6>
    </div>
    
    <!-- Alert -->
    <div class="col-md-6">
      <div class="alert alert-success">
        <strong>Well done!</strong> You successfully read this important alert message.
      </div>
      <div class="alert alert-info">
        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
      </div>
      <div class="alert alert-warning">
        <strong>Warning!</strong> Best check yo self, you're not looking too good.
      </div>
      <div class="alert alert-danger">
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
      </div>
    </div>
  </div>
  
  <div class="table-row">
    <!-- HTML Style -->
    <div class="col-md-6">
      <p><a href="#">This is text link</a> lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="underline">This is underlined text</span> morbi ut elit ut ipsum tristique accumsan. Excepteur sint occaecat cupidatat non proident. <span class="highlight">This is highlighted text</span> sed sagittis mattis lorem at pretium. Pellentesque habitant morbi tristique.</p>

      <p>Lorem ipsum dolor sit amet, <small>This line of text is meant to be treated as fine print.</small> dolore magna aliqua. <strong>rendered as bold text</strong>, quis nostrud <em>rendered as italicized text</em> ut aliquip ex ea commodo <abbr title="HyperText Markup Language" class="initialism">HTML</abbr>.</p>
    </div>

    <!-- Dropcap -->
    <div class="col-md-6">
      <p class="text-muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
      <p class="text-primary">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
      <p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
      <p class="text-info">Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
      <p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
      <p class="text-danger">Donec ullamcorper nulla non metus auctor fringilla.</p>
    </div>
  </div>
  
  <div class="table-row">
    <!-- List -->
    <div class="col-md-6">
      <div class="row">
        <div class="col-sm-6">
          <ul>
            <li>Fusce dapibus, tellus.</li>
            <li>Etiam porta sem magna.</li>
            <li>Donec nulla non metus.</li>
            <li>Duis mollis, est non.</li>
            <li>Fusce dapibus, tellus.</li>
            <li>Etiam porta sem magna.</li>
            <li>Donec nulla non metus.</li>
            <li>Duis mollis, est non.</li>
          </ul>
        </div>
        <div class="col-sm-6">
          <ol>
            <li>Fusce dapibus, tellus.</li>
            <li>Etiam porta sem magna.</li>
            <li>Donec nulla non metus.</li>
            <li>Duis mollis, est non.</li>
            <li>Fusce dapibus, tellus.</li>
            <li>Etiam porta sem magna.</li>
            <li>Donec nulla non metus.</li>
            <li>Duis mollis, est non.</li>
          </ol>
        </div>
      </div>
    </div>
    
    <!-- Labels &  Bedges -->
    <div class="col-md-6">
      <div class="row">
        <div class="col-sm-6">
          <p><span class="label label-default">Default</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="label label-primary">primary</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="label label-success">success</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="label label-info">info</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="label label-warning">warning</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="label label-danger">danger</span> Lorem ipsum dolor sit amet.</p>
        </div>
        <div class="col-sm-6">
          <p><span class="badge label-default">1</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="badge label-primary">2</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="badge label-success">3</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="badge label-info">4</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="badge label-warning">5</span> Lorem ipsum dolor sit amet.</p>
          <p><span class="badge label-danger">6</span> Lorem ipsum dolor sit amet.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="table-row">
    <!-- Blockquote -->
    <div class="col-md-6">
      <blockquote>
        <p>This is a sample <strong>Blockquote</strong>. Lorem ipsum dolor sit amet consectetuer rutrum dignissim et neque id. Interdum pharetra in a metus congue In Sed Pellentesque tincidunt pharetra.</p>
        <cite title="Source Title">Source Title</cite>
      </blockquote>
    </div>

    <!-- Code -->
    <div class="col-md-6">
<pre class="prettyprint linenums">
&lt;div class="grid-wrap"&gt;
  &lt;div class="col-grid"&gt;
    &lt;div class="col-1"&gt;.col-1&lt;/div&gt;
    &lt;div class="col-1"&gt;.col-1&lt;/div&gt;
    &lt;div class="col-1"&gt;.col-1&lt;/div&gt;
    &lt;div class="col-1"&gt;.col-1&lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>
    </div>
  </div>

  <div class="table-row">
    <!-- Tab -->
    <div class="col-md-6">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
        <li><a href="#profile" data-toggle="tab">Profile</a></li>
        <li><a href="#messages" data-toggle="tab">Messages</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
          <img class="alignleft" src="http://demo.designwall.com/dw-fixel/wp-content/uploads/img-63-300x300.jpg" width="100">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor, rhoncus rhoncus sem. Aliquam volutpat arcu et nibh mollis eleifend pharetra lorem scelerisque.</p>
        </div>
        <div class="tab-pane fade" id="profile">
          <img class="alignleft" src="http://demo.designwall.com/dw-fixel/wp-content/uploads/img-60-300x300.jpg" width="100">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor, rhoncus rhoncus sem. Aliquam volutpat arcu et nibh mollis eleifend pharetra lorem scelerisque.</p>
        </div>
        <div class="tab-pane fade" id="messages">
          <img class="alignleft" src="http://demo.designwall.com/dw-fixel/wp-content/uploads/img-32-300x300.jpg" width="100">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor, rhoncus rhoncus sem. Aliquam volutpat arcu et nibh mollis eleifend pharetra lorem scelerisque.</p>
        </div>
      </div>
    </div>

    <!-- Collapse -->
    <div class="col-md-6">
      <div class="panel-group" id="accordion">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                Collapsible Group Item #1
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
              <img class="alignleft" src="http://demo.designwall.com/dw-fixel/wp-content/uploads/img-63-300x300.jpg" width="100">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor, rhoncus rhoncus sem. Aliquam volutpat arcu et nibh mollis eleifend pharetra lorem scelerisque.</p>
            </div>
          </div>
        </div>
        <div class="panel panel-success">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                Collapsible Group Item #2
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
              <img class="alignleft" src="http://demo.designwall.com/dw-fixel/wp-content/uploads/img-60-300x300.jpg" width="100">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor, rhoncus rhoncus sem. Aliquam volutpat arcu et nibh mollis eleifend pharetra lorem scelerisque.</p>
            </div>
          </div>
        </div>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="">
                Collapsible Group Item #3
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
              <img class="alignleft" src="http://demo.designwall.com/dw-fixel/wp-content/uploads/img-32-300x300.jpg" width="100">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor, rhoncus rhoncus sem. Aliquam volutpat arcu et nibh mollis eleifend pharetra lorem scelerisque.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="table-row">
    <!-- Table -->
    <div class="col-md-6">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="2">1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@TwBootstrap</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td>3</td>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- Dropcap -->
    <div class="col-md-6">
      <p><span class="dropcap">L</span>orem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut elit ut ipsum tristique accumsan. Sed sagittis mattis lorem at pretium. Pellentesque habitant morbi tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut elit ut ipsum tristique accumsan. Sed sagittis mattis lorem at pretium. Pellentesque habitant morbi tristique.</p>

      <p><span class="dropcap dropcap-success">L</span>orem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut elit ut ipsum tristique accumsan. Sed sagittis mattis lorem at pretium. Pellentesque habitant morbi tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut elit ut ipsum tristique accumsan. Sed sagittis mattis lorem at pretium. Pellentesque habitant morbi tristique.</p>

      <p><span class="dropcap dropcap-danger">L</span>orem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut elit ut ipsum tristique accumsan. Sed sagittis mattis lorem at pretium. Pellentesque habitant morbi tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut elit ut ipsum tristique accumsan. Sed sagittis mattis lorem at pretium. Pellentesque habitant morbi tristique.</p>
    </div>
  </div>
  
  <!-- form -->
  <div class="table-row">
    <div class="col-md-6">
      <div class="row">
        <div class="form-group">
          <div class="col-sm-9"><input class="form-control" type="text" placeholder=".col-sm-9"></div>
          <div class="col-sm-3 has-error"><input class="form-control" type="text" placeholder="col-sm-3" ></div>
        </div>

        <div class="form-group">
          <div class="col-sm-8"><input class="form-control" type="text" placeholder=".col-sm-8"></div>
          <div class="col-sm-4 has-warning"><input class="form-control" type="text" placeholder=".col-sm-4"></div>
        </div>

        <div class="form-group">
          <div class="col-sm-7"><input class="form-control" type="text" placeholder="col-sm-7"></div>
          <div class="col-sm-5 has-success"><input class="form-control" type="text" placeholder=".col-sm-5"></div>
        </div>

        <div class="form-group">
          <div class="col-sm-6"><input class="form-control" type="text" placeholder=".col-sm-6"></div>
          <div class="col-sm-6"><input class="form-control" type="text" placeholder="Disabled input here..." disabled></div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <textarea class="form-control" rows="6" placeholder="Textarea"></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 no-border">
      <div class="form-group">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Option one is this and that-be sure to include why it's great
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Option one is this and that-be sure to include why it's great
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="">
            Option one is this and that-be sure to include why it's great
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="">
            Option one is this and that-be sure to include why it's great
          </label>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <div class="col-lg-9">
            <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-lg-9">
            <select multiple="" class="form-control">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="table-row">
    <!-- Button -->
    <div class="col-md-6">
      <button type="button" class="btn btn-default">Default</button>
      <button type="button" class="btn btn-primary">Primary</button>
      <button type="button" class="btn btn-success">Success</button>
      <button type="button" class="btn btn-info">Info</button>
      <button type="button" class="btn btn-warning">Warning</button>
      <button type="button" class="btn btn-danger">Danger</button>
      <button type="button" class="btn btn-link">Link</button>
      
      <br><br>

      <button type="button" class="btn btn-coner btn-default">Default</button>
      <button type="button" class="btn btn-coner btn-primary">Primary</button>
      <button type="button" class="btn btn-coner btn-success">Success</button>
      <button type="button" class="btn btn-coner btn-info">Info</button>
      <button type="button" class="btn btn-coner btn-warning">Warning</button>
      <button type="button" class="btn btn-coner btn-danger">Danger</button>
      <button type="button" class="btn btn-coner btn-link">Link</button>

      <br><br>

      <button type="button" class="btn btn-default btn-lg">Large</button>
      <button type="button" class="btn btn-default">Default</button>
      <button type="button" class="btn btn-default btn-sm">Small</button>
      <button type="button" class="btn btn-default btn-xs">Extra small</button>
    </div>

    <!-- Progress Bar -->
    <div class="col-md-6">
      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
          <span class="sr-only">60% Complete</span>
        </div>
      </div>

      <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
          <span class="sr-only">40% Complete (success)</span>
        </div>
      </div>

      <div class="progress">
        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
          <span class="sr-only">20% Complete</span>
        </div>
      </div>

      <div class="progress progress-striped">
        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
          <span class="sr-only">60% Complete (warning)</span>
        </div>
      </div>
      <div class="progress progress-striped">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
          <span class="sr-only">80% Complete (danger)</span>
        </div>
      </div>

      <div class="progress progress-striped active">
        <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
          <span class="sr-only">45% Complete</span>
        </div>
      </div>

      <div class="progress">
        <div class="progress-bar progress-bar-success" style="width: 35%">
          <span class="sr-only">35% Complete (success)</span>
        </div>
        <div class="progress-bar progress-bar-warning" style="width: 20%">
          <span class="sr-only">20% Complete (warning)</span>
        </div>
        <div class="progress-bar progress-bar-danger" style="width: 10%">
          <span class="sr-only">10% Complete (danger)</span>
        </div>
      </div>
    </div>
  </div>

  <div class="table-row">
    <!-- Gallery -->
    <div class="col-md-6">
      <?php echo do_shortcode( '[gallery ids="55,46,44,38,29,28,27,26,23,18,15,14"]' ); ?>
    </div>

    <!-- Carousel -->
    <div class="col-md-6">
      <iframe src="//player.vimeo.com/video/79298633" width="538" height="305" frameborder="0" title="Design Starts Here" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
    </div>
  </div>

  <div class="table-row">
    <!-- Vimeo -->
    <div class="col-md-12">
      <ul class="bs-glyphicons">
      <li>
        <span class="glyphicon glyphicon-adjust"></span>
        <span class="glyphicon-class">glyphicon glyphicon-adjust</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-align-center"></span>
        <span class="glyphicon-class">glyphicon glyphicon-align-center</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-align-justify"></span>
        <span class="glyphicon-class">glyphicon glyphicon-align-justify</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-align-left"></span>
        <span class="glyphicon-class">glyphicon glyphicon-align-left</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-align-right"></span>
        <span class="glyphicon-class">glyphicon glyphicon-align-right</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-arrow-down"></span>
        <span class="glyphicon-class">glyphicon glyphicon-arrow-down</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-arrow-left"></span>
        <span class="glyphicon-class">glyphicon glyphicon-arrow-left</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-arrow-right"></span>
        <span class="glyphicon-class">glyphicon glyphicon-arrow-right</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-arrow-up"></span>
        <span class="glyphicon-class">glyphicon glyphicon-arrow-up</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-asterisk"></span>
        <span class="glyphicon-class">glyphicon glyphicon-asterisk</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-backward"></span>
        <span class="glyphicon-class">glyphicon glyphicon-backward</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-ban-circle"></span>
        <span class="glyphicon-class">glyphicon glyphicon-ban-circle</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-barcode"></span>
        <span class="glyphicon-class">glyphicon glyphicon-barcode</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-bell"></span>
        <span class="glyphicon-class">glyphicon glyphicon-bell</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-bold"></span>
        <span class="glyphicon-class">glyphicon glyphicon-bold</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-book"></span>
        <span class="glyphicon-class">glyphicon glyphicon-book</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-bookmark"></span>
        <span class="glyphicon-class">glyphicon glyphicon-bookmark</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-briefcase"></span>
        <span class="glyphicon-class">glyphicon glyphicon-briefcase</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-bullhorn"></span>
        <span class="glyphicon-class">glyphicon glyphicon-bullhorn</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-calendar"></span>
        <span class="glyphicon-class">glyphicon glyphicon-calendar</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-camera"></span>
        <span class="glyphicon-class">glyphicon glyphicon-camera</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-certificate"></span>
        <span class="glyphicon-class">glyphicon glyphicon-certificate</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-check"></span>
        <span class="glyphicon-class">glyphicon glyphicon-check</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-chevron-down"></span>
        <span class="glyphicon-class">glyphicon glyphicon-chevron-down</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="glyphicon-class">glyphicon glyphicon-chevron-left</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="glyphicon-class">glyphicon glyphicon-chevron-right</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-chevron-up"></span>
        <span class="glyphicon-class">glyphicon glyphicon-chevron-up</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-circle-arrow-down"></span>
        <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-down</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-circle-arrow-left"></span>
        <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-left</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-circle-arrow-right"></span>
        <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-right</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-circle-arrow-up"></span>
        <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-up</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-cloud"></span>
        <span class="glyphicon-class">glyphicon glyphicon-cloud</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-cloud-download"></span>
        <span class="glyphicon-class">glyphicon glyphicon-cloud-download</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-cloud-upload"></span>
        <span class="glyphicon-class">glyphicon glyphicon-cloud-upload</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-cog"></span>
        <span class="glyphicon-class">glyphicon glyphicon-cog</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-collapse-down"></span>
        <span class="glyphicon-class">glyphicon glyphicon-collapse-down</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-collapse-up"></span>
        <span class="glyphicon-class">glyphicon glyphicon-collapse-up</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-comment"></span>
        <span class="glyphicon-class">glyphicon glyphicon-comment</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-compressed"></span>
        <span class="glyphicon-class">glyphicon glyphicon-compressed</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-copyright-mark"></span>
        <span class="glyphicon-class">glyphicon glyphicon-copyright-mark</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-credit-card"></span>
        <span class="glyphicon-class">glyphicon glyphicon-credit-card</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-cutlery"></span>
        <span class="glyphicon-class">glyphicon glyphicon-cutlery</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-dashboard"></span>
        <span class="glyphicon-class">glyphicon glyphicon-dashboard</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-download"></span>
        <span class="glyphicon-class">glyphicon glyphicon-download</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-download-alt"></span>
        <span class="glyphicon-class">glyphicon glyphicon-download-alt</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-earphone"></span>
        <span class="glyphicon-class">glyphicon glyphicon-earphone</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-edit"></span>
        <span class="glyphicon-class">glyphicon glyphicon-edit</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-eject"></span>
        <span class="glyphicon-class">glyphicon glyphicon-eject</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-envelope"></span>
        <span class="glyphicon-class">glyphicon glyphicon-envelope</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-euro"></span>
        <span class="glyphicon-class">glyphicon glyphicon-euro</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-exclamation-sign"></span>
        <span class="glyphicon-class">glyphicon glyphicon-exclamation-sign</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-expand"></span>
        <span class="glyphicon-class">glyphicon glyphicon-expand</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-export"></span>
        <span class="glyphicon-class">glyphicon glyphicon-export</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-eye-close"></span>
        <span class="glyphicon-class">glyphicon glyphicon-eye-close</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-eye-open"></span>
        <span class="glyphicon-class">glyphicon glyphicon-eye-open</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-facetime-video"></span>
        <span class="glyphicon-class">glyphicon glyphicon-facetime-video</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-fast-backward"></span>
        <span class="glyphicon-class">glyphicon glyphicon-fast-backward</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-fast-forward"></span>
        <span class="glyphicon-class">glyphicon glyphicon-fast-forward</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-file"></span>
        <span class="glyphicon-class">glyphicon glyphicon-file</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-film"></span>
        <span class="glyphicon-class">glyphicon glyphicon-film</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-filter"></span>
        <span class="glyphicon-class">glyphicon glyphicon-filter</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-fire"></span>
        <span class="glyphicon-class">glyphicon glyphicon-fire</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-flag"></span>
        <span class="glyphicon-class">glyphicon glyphicon-flag</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-flash"></span>
        <span class="glyphicon-class">glyphicon glyphicon-flash</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-floppy-disk"></span>
        <span class="glyphicon-class">glyphicon glyphicon-floppy-disk</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-floppy-open"></span>
        <span class="glyphicon-class">glyphicon glyphicon-floppy-open</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-floppy-remove"></span>
        <span class="glyphicon-class">glyphicon glyphicon-floppy-remove</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-floppy-save"></span>
        <span class="glyphicon-class">glyphicon glyphicon-floppy-save</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-floppy-saved"></span>
        <span class="glyphicon-class">glyphicon glyphicon-floppy-saved</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-folder-close"></span>
        <span class="glyphicon-class">glyphicon glyphicon-folder-close</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-folder-open"></span>
        <span class="glyphicon-class">glyphicon glyphicon-folder-open</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-font"></span>
        <span class="glyphicon-class">glyphicon glyphicon-font</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-forward"></span>
        <span class="glyphicon-class">glyphicon glyphicon-forward</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-fullscreen"></span>
        <span class="glyphicon-class">glyphicon glyphicon-fullscreen</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-gbp"></span>
        <span class="glyphicon-class">glyphicon glyphicon-gbp</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-gift"></span>
        <span class="glyphicon-class">glyphicon glyphicon-gift</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-glass"></span>
        <span class="glyphicon-class">glyphicon glyphicon-glass</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-globe"></span>
        <span class="glyphicon-class">glyphicon glyphicon-globe</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-hand-down"></span>
        <span class="glyphicon-class">glyphicon glyphicon-hand-down</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-hand-left"></span>
        <span class="glyphicon-class">glyphicon glyphicon-hand-left</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-hand-right"></span>
        <span class="glyphicon-class">glyphicon glyphicon-hand-right</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-hand-up"></span>
        <span class="glyphicon-class">glyphicon glyphicon-hand-up</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-hd-video"></span>
        <span class="glyphicon-class">glyphicon glyphicon-hd-video</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-hdd"></span>
        <span class="glyphicon-class">glyphicon glyphicon-hdd</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-header"></span>
        <span class="glyphicon-class">glyphicon glyphicon-header</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-headphones"></span>
        <span class="glyphicon-class">glyphicon glyphicon-headphones</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-heart"></span>
        <span class="glyphicon-class">glyphicon glyphicon-heart</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-heart-empty"></span>
        <span class="glyphicon-class">glyphicon glyphicon-heart-empty</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-home"></span>
        <span class="glyphicon-class">glyphicon glyphicon-home</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-import"></span>
        <span class="glyphicon-class">glyphicon glyphicon-import</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-inbox"></span>
        <span class="glyphicon-class">glyphicon glyphicon-inbox</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-indent-left"></span>
        <span class="glyphicon-class">glyphicon glyphicon-indent-left</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-indent-right"></span>
        <span class="glyphicon-class">glyphicon glyphicon-indent-right</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-info-sign"></span>
        <span class="glyphicon-class">glyphicon glyphicon-info-sign</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-italic"></span>
        <span class="glyphicon-class">glyphicon glyphicon-italic</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-leaf"></span>
        <span class="glyphicon-class">glyphicon glyphicon-leaf</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-link"></span>
        <span class="glyphicon-class">glyphicon glyphicon-link</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-list"></span>
        <span class="glyphicon-class">glyphicon glyphicon-list</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-list-alt"></span>
        <span class="glyphicon-class">glyphicon glyphicon-list-alt</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-lock"></span>
        <span class="glyphicon-class">glyphicon glyphicon-lock</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-log-in"></span>
        <span class="glyphicon-class">glyphicon glyphicon-log-in</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-log-out"></span>
        <span class="glyphicon-class">glyphicon glyphicon-log-out</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-magnet"></span>
        <span class="glyphicon-class">glyphicon glyphicon-magnet</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-map-marker"></span>
        <span class="glyphicon-class">glyphicon glyphicon-map-marker</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-minus"></span>
        <span class="glyphicon-class">glyphicon glyphicon-minus</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-minus-sign"></span>
        <span class="glyphicon-class">glyphicon glyphicon-minus-sign</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-move"></span>
        <span class="glyphicon-class">glyphicon glyphicon-move</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-music"></span>
        <span class="glyphicon-class">glyphicon glyphicon-music</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-new-window"></span>
        <span class="glyphicon-class">glyphicon glyphicon-new-window</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-off"></span>
        <span class="glyphicon-class">glyphicon glyphicon-off</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-ok"></span>
        <span class="glyphicon-class">glyphicon glyphicon-ok</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-ok-circle"></span>
        <span class="glyphicon-class">glyphicon glyphicon-ok-circle</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-ok-sign"></span>
        <span class="glyphicon-class">glyphicon glyphicon-ok-sign</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-open"></span>
        <span class="glyphicon-class">glyphicon glyphicon-open</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-paperclip"></span>
        <span class="glyphicon-class">glyphicon glyphicon-paperclip</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-pause"></span>
        <span class="glyphicon-class">glyphicon glyphicon-pause</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-pencil"></span>
        <span class="glyphicon-class">glyphicon glyphicon-pencil</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-phone"></span>
        <span class="glyphicon-class">glyphicon glyphicon-phone</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-phone-alt"></span>
        <span class="glyphicon-class">glyphicon glyphicon-phone-alt</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-picture"></span>
        <span class="glyphicon-class">glyphicon glyphicon-picture</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-plane"></span>
        <span class="glyphicon-class">glyphicon glyphicon-plane</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-play"></span>
        <span class="glyphicon-class">glyphicon glyphicon-play</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-play-circle"></span>
        <span class="glyphicon-class">glyphicon glyphicon-play-circle</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-plus"></span>
        <span class="glyphicon-class">glyphicon glyphicon-plus</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-plus-sign"></span>
        <span class="glyphicon-class">glyphicon glyphicon-plus-sign</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-print"></span>
        <span class="glyphicon-class">glyphicon glyphicon-print</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-pushpin"></span>
        <span class="glyphicon-class">glyphicon glyphicon-pushpin</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-qrcode"></span>
        <span class="glyphicon-class">glyphicon glyphicon-qrcode</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-question-sign"></span>
        <span class="glyphicon-class">glyphicon glyphicon-question-sign</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-random"></span>
        <span class="glyphicon-class">glyphicon glyphicon-random</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-record"></span>
        <span class="glyphicon-class">glyphicon glyphicon-record</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-refresh"></span>
        <span class="glyphicon-class">glyphicon glyphicon-refresh</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-registration-mark"></span>
        <span class="glyphicon-class">glyphicon glyphicon-registration-mark</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-remove"></span>
        <span class="glyphicon-class">glyphicon glyphicon-remove</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-remove-circle"></span>
        <span class="glyphicon-class">glyphicon glyphicon-remove-circle</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-remove-sign"></span>
        <span class="glyphicon-class">glyphicon glyphicon-remove-sign</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-repeat"></span>
        <span class="glyphicon-class">glyphicon glyphicon-repeat</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-resize-full"></span>
        <span class="glyphicon-class">glyphicon glyphicon-resize-full</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-resize-horizontal"></span>
        <span class="glyphicon-class">glyphicon glyphicon-resize-horizontal</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-resize-small"></span>
        <span class="glyphicon-class">glyphicon glyphicon-resize-small</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-resize-vertical"></span>
        <span class="glyphicon-class">glyphicon glyphicon-resize-vertical</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-retweet"></span>
        <span class="glyphicon-class">glyphicon glyphicon-retweet</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-road"></span>
        <span class="glyphicon-class">glyphicon glyphicon-road</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-save"></span>
        <span class="glyphicon-class">glyphicon glyphicon-save</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-saved"></span>
        <span class="glyphicon-class">glyphicon glyphicon-saved</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-screenshot"></span>
        <span class="glyphicon-class">glyphicon glyphicon-screenshot</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sd-video"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sd-video</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-search"></span>
        <span class="glyphicon-class">glyphicon glyphicon-search</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-send"></span>
        <span class="glyphicon-class">glyphicon glyphicon-send</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-share"></span>
        <span class="glyphicon-class">glyphicon glyphicon-share</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-share-alt"></span>
        <span class="glyphicon-class">glyphicon glyphicon-share-alt</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-shopping-cart"></span>
        <span class="glyphicon-class">glyphicon glyphicon-shopping-cart</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-signal"></span>
        <span class="glyphicon-class">glyphicon glyphicon-signal</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sort"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sort</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sort-by-alphabet"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sort-by-alphabet</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sort-by-alphabet-alt</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sort-by-attributes"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sort-by-attributes</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sort-by-attributes-alt</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sort-by-order"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sort-by-order</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sort-by-order-alt"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sort-by-order-alt</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sound-5-1"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sound-5-1</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sound-6-1"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sound-6-1</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sound-7-1"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sound-7-1</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sound-dolby"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sound-dolby</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-sound-stereo"></span>
        <span class="glyphicon-class">glyphicon glyphicon-sound-stereo</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon-class">glyphicon glyphicon-star</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-star-empty"></span>
        <span class="glyphicon-class">glyphicon glyphicon-star-empty</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-stats"></span>
        <span class="glyphicon-class">glyphicon glyphicon-stats</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-step-backward"></span>
        <span class="glyphicon-class">glyphicon glyphicon-step-backward</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-step-forward"></span>
        <span class="glyphicon-class">glyphicon glyphicon-step-forward</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-stop"></span>
        <span class="glyphicon-class">glyphicon glyphicon-stop</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-subtitles"></span>
        <span class="glyphicon-class">glyphicon glyphicon-subtitles</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-tag"></span>
        <span class="glyphicon-class">glyphicon glyphicon-tag</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-tags"></span>
        <span class="glyphicon-class">glyphicon glyphicon-tags</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-tasks"></span>
        <span class="glyphicon-class">glyphicon glyphicon-tasks</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-text-height"></span>
        <span class="glyphicon-class">glyphicon glyphicon-text-height</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-text-width"></span>
        <span class="glyphicon-class">glyphicon glyphicon-text-width</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-th"></span>
        <span class="glyphicon-class">glyphicon glyphicon-th</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-th-large"></span>
        <span class="glyphicon-class">glyphicon glyphicon-th-large</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-th-list"></span>
        <span class="glyphicon-class">glyphicon glyphicon-th-list</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-thumbs-down"></span>
        <span class="glyphicon-class">glyphicon glyphicon-thumbs-down</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-thumbs-up"></span>
        <span class="glyphicon-class">glyphicon glyphicon-thumbs-up</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-time"></span>
        <span class="glyphicon-class">glyphicon glyphicon-time</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-tint"></span>
        <span class="glyphicon-class">glyphicon glyphicon-tint</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-tower"></span>
        <span class="glyphicon-class">glyphicon glyphicon-tower</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-transfer"></span>
        <span class="glyphicon-class">glyphicon glyphicon-transfer</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-trash"></span>
        <span class="glyphicon-class">glyphicon glyphicon-trash</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-tree-conifer"></span>
        <span class="glyphicon-class">glyphicon glyphicon-tree-conifer</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-tree-deciduous"></span>
        <span class="glyphicon-class">glyphicon glyphicon-tree-deciduous</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-unchecked"></span>
        <span class="glyphicon-class">glyphicon glyphicon-unchecked</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-upload"></span>
        <span class="glyphicon-class">glyphicon glyphicon-upload</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-usd"></span>
        <span class="glyphicon-class">glyphicon glyphicon-usd</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-user"></span>
        <span class="glyphicon-class">glyphicon glyphicon-user</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-volume-down"></span>
        <span class="glyphicon-class">glyphicon glyphicon-volume-down</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-volume-off"></span>
        <span class="glyphicon-class">glyphicon glyphicon-volume-off</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-volume-up"></span>
        <span class="glyphicon-class">glyphicon glyphicon-volume-up</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-warning-sign"></span>
        <span class="glyphicon-class">glyphicon glyphicon-warning-sign</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-wrench"></span>
        <span class="glyphicon-class">glyphicon glyphicon-wrench</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-zoom-in"></span>
        <span class="glyphicon-class">glyphicon glyphicon-zoom-in</span>
      </li>
      <li>
        <span class="glyphicon glyphicon-zoom-out"></span>
        <span class="glyphicon-class">glyphicon glyphicon-zoom-out</span>
      </li>
    </ul>
    </div>
  </div>
</div>
