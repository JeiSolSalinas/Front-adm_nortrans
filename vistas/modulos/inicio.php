
<input type="hidden" name="rol" id="rol" value="<?php echo $_SESSION['rol']; ?>">


<script src="vistas/js/inicio.js"></script>

<style>
  #div1 {
      overflow:scroll;
      width:100%;
      background-color:white;
  }

  #div1 table {
      width:100%;
      background-color:lightgray;
  }

  .leaflet-container {
			height: 450px;
			width: 300px;
			max-width: 100%;
			max-height: 100%;
		}

    table td {
      text-align: center;
      
    }

    table, th, td {
      border: 1px solid black;
    }

    table th{
      background: #D3D3D3; 
      position: sticky; 
      top: 0; 
      box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
      z-index: 10;
    }
</style>

