<div class="container-fluid">
  <div class="row mainpanel">
    <div class="col-md-7 leftpanel">
      <div class="gameboard">
        <div class="row turn hidden-xs">
          <div class="col-md-12"></div>
        </div>
        <div class="row">
          <div class="col-md-4 col-xs-4 box tleft" id="0"></div>
          <div class="col-md-4 col-xs-4 box top" id="1"></div>
          <div class="col-md-4 col-xs-4 box tright" id="2"></div>
        </div>
        <div class="row">
          <div class="col-md-4 col-xs-4 box mleft" id="3"></div>
          <div class="col-md-4 col-xs-4 box middle" id="4"></div>
          <div class="col-md-4 col-xs-4 box mright" id="5"></div>
        </div>
        <div class="row">
          <div class="col-md-4 col-xs-4 box bleft" id="6"></div>
          <div class="col-md-4 col-xs-4 box bottom" id="7"></div>
          <div class="col-md-4 col-xs-4 box bright" id="8"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-4">
          <center>
            <h1>
              <div id="moveTurn">
              </div>
            </h1>
          </center>
        </div>
      </div>
    </div>
    <div class="col-md-5 hidden-xs rightpanel color-swatch gray-lighter">
      <div class="row turn">
        <div class="col">
          <p>
            <center>
              <h1>Tres en Línea</h1>
            </center>
          </p>
          <br>
          <p id="player"></p>
        </div>
        <div class="col-md-12 col-xs-12 footer">
          <br><br>
          <div class="friend_computer">
            <center>
              <h3>MODO</h3>
            </center>
            <div class="computer">
              Jugar contra PC <i class="fa fa-desktop fa-lg" aria-hidden="true"></i>
            </div>
            <div class="friend">
              Jugar contra rival <i class="fa fa-user fa-lg" aria-hidden="true"></i>
            </div>
          </div>
          <br><br>
          <p>
            <center>
              <h3>DIFICULTAD</h3>
            </center>
            <div class="btn-group" role="group">
              <a href="<?php echo base_url(); ?>tictactoe/index/0"><button type="button" class="btn btn-secondary">Fácil</button></a>
              <a href="<?php echo base_url(); ?>tictactoe/index/1"><button type="button" class="btn btn-secondary">Normal</button></a>
              <a href="<?php echo base_url(); ?>tictactoe/index/2"><button type="button" class="btn btn-secondary">Dificil</button></a>
            </div>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/game.js"></script>