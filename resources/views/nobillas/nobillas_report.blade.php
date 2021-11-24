<html>
    <style>
        @page {
            margin: 100px 25px;
        }
        tr:nth-child(even){
            background-color: #dddddd;
        }
        td,th{
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .table{
            border-collapse: collapse; 
            width: 100%; 
            font-size: 12px;
            border:1px solid #ddd; 
            border-bottom:1px solid #ddd;
            text-align: center;
        }
        
        body{
            font-family: sans-serif;
        }
        .page-break {
            page-break-after: always;
        }
        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed; 
            bottom: -60px; 
            left: 0px; 
            right: 0px;
            height: 50px; 

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        
    </style>
    <div class="page-break">
            <header>
                Reporte de Nobillas 
            </header>

            <footer>
                Copyright &copy; <?php echo date("Y");?> 
            </footer>

        <table class="table">
            <tr>
                <th>Numero de Registro</th>
                <th>Fecha de Nacimiento</th>
                <th>Nombre del Toro</th>
                <th>Edad del Toro</th>
                <th>Peso de Nacimiento</th>
                <th>Peso al Destetar</th>
                <th>Numero de Registro del Padre</th>
                <th>Numero de Registro de la Madre</th>
            </tr>
            <tbody>
                @if($nobillas->count())  
                @foreach($nobillas as $nobilla)  
                <tr>
                    <td>{{$nobilla->num_registro}}</td>
                    <td>{{$->fecha_nacim}}</td>
                    <td>{{$nobilla->nombre_nobilla}}</td>
                    <td>{{$nobilla->edad_nobilla}}</td>
                    <td>{{$nobilla->peso_nacim}}</td>
                    <td>{{$nobilla->peso_destete}}</td>
                    <td>{{$nobilla->num_registro_papa}}</td>
                    <td>{{$nobilla->num_registro_mama}}</td>
                </tr>
                @endforeach 
                @else
                <tr>
                    <td colspan="10" class="text-center">No hay registro !!</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</html>