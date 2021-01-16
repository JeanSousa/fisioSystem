<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
           padding: 5px;
        }

        th {
            padding: 10px;
        }
    </style>
    
</head>
<body>
    <h2 style="text-align: justify"> 
        <img src="{{asset('storage/reports/logo_report.jpeg')}}" 
        style="width: 100px; height: 120px; margin-button: - 20px" >
        
        Relatório de Evolução do Paciente
        
    </h2>
   
    <h3 style="text-align: justify">
        Fisioterapeuta: {{ucwords(auth()->user()->name)}} &nbsp;&nbsp;
        Crefito: {{ucwords(auth()->user()->crefito)}}
    </h3>
    <h3 style="text-align: justify">
        Paciente: {{ucwords($evolutions->patient->name)}}
    </h3>
    
    
    @foreach ($evolutions as $evolution)      
        <table cellspacing=0 style="border-collapse:collapse;">    
			<tr style="width:0*;font-family:Verdana;font-size:small;font-variant:small-caps;">           
				<th style="border:grey dashed 1px;"> Saturação O<sub>2</sub></th>           		
				<th style="border:grey dashed 1px;"> Pressão Arterial Inicial</th>           
                <th style="border:grey dashed 1px;"> Pressão Arterial Final</th>  
                <th style="border:grey dashed 1px;"> Data Atendimento</th>                         
            </tr>  
			<tr>           
                <td style="border:grey dashed 1px;">
                    {{$evolution->o2_saturation}}
                </td> 
                <td style="border:grey dashed 1px;">
                    {{$evolution->initial_blood_pressure}}
                </td> 
                <td style="border:grey dashed 1px;">
                    {{$evolution->final_blood_pressure}}
                </td> 
                <td style="border:grey dashed 1px;">
                    {{\Carbon\Carbon::parse($evolution->evolution_date)->format('d/m/Y')}}
                </td>              
            </tr>
            <tr>
                <td style="border:grey dashed 1px;">Observação:</td>
                <td style="border:grey dashed 1px;" colspan="3">
                {{$evolution->observation}}
                </td>
            </tr>
        </table> 
        <br>
    @endforeach
    <br>
    <p>______________________________________</p>
    <p>Fisioterapeuta: {{ucwords(auth()->user()->name)}}</p>
</body>
</html>




