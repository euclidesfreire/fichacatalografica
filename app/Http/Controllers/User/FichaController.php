<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\FichaRepository;
use App\Repositories\CduRepository;
use App\Repositories\StatusRepository;
use App\Repositories\FeedbackRepository;
use Cezpdf;

class FichaController extends Controller
{
	private $output;
    private $outDir = 'pdf/out';


    protected $fichaRepository;
    protected $cduRepository;
    protected $statusRepository;
    protected $feedbackRepository;

    public function __construct(
        FichaRepository $ficha,
        CduRepository $cdu, 
        StatusRepository $status, 
        FeedbackRepository $feedback
    )
    {
        $this->middleware('auth:user');
        
        $this->fichaRepository = $ficha;
        $this->cduRepository = $cdu;
        $this->statusRepository = $status;
        $this->feedbackRepository = $feedback;
    }

	public function index(){
         return view('user.home');
	}

    public function getCreate()
    {

    }

    public function postCreate(Request $request)
    {
        $idUser = Auth::user()->id;

        $assunto4 = ($request->input('assunto4') !== NULL) ? $request->input('assunto4')  : "";
        $assunto5 = ($request->input('assunto5') !== NULL) ? $request->input('assunto5')  : "";


        $dataFicha = array(
            'id_user' => $idUser,
            'nome' => $request->input('autor_nome'),
            'sobrenome' => $request->input('autor_sobrenome'),
            'titulo' => $request->input('titulo'),
            'subtitulo' => $request->input('subtitulo'),
            'universidade' => $request->input('universidade'),
            'cidade' => $request->input('cidade'),
            'ano' => $request->input('ano'),
            'nivel' => $request->input('nivel_trabalho'),
            'departamento' => $request->input('departamento'),
            'curso' => $request->input('curso'),
            'nome_orientador' => $request->input('orientador_nome'),
            'sobrenome_orientador' => $request->input('orientador_sobrenome'),
            'assunto1' => $request->input('assunto1'),
            'assunto2' => $request->input('assunto2'),
            'assunto3' => $request->input('assunto3'),
            'assunto4' => $assunto4,
            'assunto5' => $assunto5,
        );

        // foreach ($dataFicha as &$data) {
        //     $data = utf8_decode($data);
        // }

        // $text = $this->assemble($dataFicha);

        // $this->generatePdf($text);

        $ficha = $this->fichaRepository->create($dataFicha);

        $this->statusUpdate($ficha->id, 'Solicitado');

        return redirect()->route('user.home');

    }

    public function show()
    {
        $idUser = Auth::user()->id;

        $fichas = $this->fichaRepository->getFichaUser($idUser);

        $fichasArray = array();

        foreach ($fichas as $ficha) {

            $dataStatus = $label = $action = $link = $status = "";

            $statusVar = $this->statusRepository->getStatus($ficha->id);


           foreach ($statusVar as $value) {
            
                $status = $value->status;

            if($status == "Solicitado"){
                $dataStatus = 'inactive';
                $label = 'label-warning';
                $action = '';
                $link = "";
            } else if($status == "Deferido"){
                $dataStatus = 'active';
                $label = 'label-success';
                $action = 'Download';
                $link = "user/ficha/download";
            } else if($status == "Indeferido"){
                $dataStatus = 'expired';
                $label = 'label-danger';
                $action = 'Update';
                $link = "user/ficha/update";
            }  

            }     

            $fichasArray[] = [
                'id' => $ficha->id,
                'titulo' => $ficha->titulo,
                'status' => $status,
                'datastatus' => $dataStatus,
                'label' => $label,
                'action' => $action,
                'link' => $link,
            ];
        }

        return view('user.show', ['fichas' => $fichasArray]);
    }

    public function getUpdate()
    {

    }

    public function postUpdate()
    {

    }


    public function download($id)
    {
        $fichas = $this->fichaRepository->getFicha($id);

        $dataFicha;

        foreach ($fichas as $ficha) {
            $dataFicha = array(
                'id' => $ficha->id,
                'nome' => $ficha->nome,
                'sobrenome' => $ficha->sobrenome,
                'titulo' => $ficha->titulo,
                'subtitulo' => $ficha->subtitulo,
                'universidade' => $ficha->universidade,
                'cidade' => $ficha->cidade,
                'ano' => $ficha->ano,
                'nivel' => $ficha->nivel,
                'departamento' => $ficha->departamento,
                'curso' => $ficha->curso,
                'nome_orientador' => $ficha->nome_orientador,
                'sobrenome_orientador' => $ficha->sobrenome_orientador,
                'assunto1' => $ficha->assunto1,
                'assunto2' => $ficha->assunto2,
                'assunto3' => $ficha->assunto3,
                'assunto4' => $ficha->assunto4,
                'assunto5' => $ficha->assunto5,
            );
        }

        $text = $this->assemble($dataFicha);

        $this->generatePdf($text);

        $this->baixar();

        return redirect()->route('user.ficha.show');
    }

    public function baixar (){
        $arquivo = 'generatePdf.pdf';

        $caminho_download = "pdf/out/" . $arquivo;
    
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($arquivo).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($caminho_download));
        readfile($caminho_download);
        exit;
    }

    public function statusUpdate($id, $status)
    {
        $data = array(
            'id_ficha' => $id,
            'status' => $status,
        );
    
        $this->statusRepository->create($data);
    }
    public function assemble($dataFicha)
    {
    	$text = $dataFicha['sobrenome'] . ", "
    	. $dataFicha['nome'] . "\n"
		. "        " . $dataFicha['titulo'] . " / "
		. $dataFicha['nome'] . " "
		. $dataFicha['sobrenome'] . "." 
		. " - " . $dataFicha['cidade'] . ","
		. $dataFicha['ano'] . ". \n\n"
		. "        " . $dataFicha['nivel'] . " - "
		. $dataFicha['curso'] . ", "
		. $dataFicha['universidade'] . ","
		. $dataFicha['ano'] . "\n\n";

		if (!empty($dataFicha['nome_orientador'])){
			$text .= "        Orientador(a): " 
			. $dataFicha['nome_orientador'] . " " 
			. $dataFicha['sobrenome_orientador'] . "\n\n";
		}

		$text .= "        1." . $dataFicha['assunto1']; 

		for($i=2;$i<=5;$i++){
			$assunto = 'assunto' . $i;
			if (!empty($dataFicha[$assunto])) 
				$text .= "$i. $dataFicha[$assunto]. "; 
		}

		$text .= "I. Título.";

		return $text;
		
 	}

 	public function generatePdf($text)
 	{ 

		$pdf = new Cezpdf('a4');

		$pdf->selectFont('Times-Roman');

		$cod = "\n CDU: 999.999.999";

        //(TOP,SPACE,ESQ,DIR)
        $pdf->ezSetMargins(560, 0, 120, 100);
		
		//(ESQ,SUPERIOR,LARGURA,ALTURA)
		$pdf->rectangle(100,65,400,220);

        $pdf -> ezText ($text, 10, array('justification' => 'left'));

        $pdf -> ezText ($cod, 10, array('justification' => 'right'));

		$this->output = $pdf->ezOutput();

        $this->savePdf(__FUNCTION__ . '.pdf');
 	}

 	/**
     * save the pdf output into a file
     */
    private function savePdf($filename)
    {
        file_put_contents($this->outDir . '/' . $filename, $this->output);
    }

    /**
     * pdf document validation (simplified)
     * 
     * TODO: Validate against ISOs and embed fonts
     */
    private function validar()
    {
        if(substr($this->output, 0, 4) != '%PDF') {
            return false;
        }

        $lines = preg_split('/\n/', $this->output, -1, PREG_SPLIT_NO_EMPTY);

        $eof = $lines[count($lines) - 1];
        $size = $lines[count($lines) - 2]; 

        if($eof != '%%EOF') {
            return false;
        }

        // calculated from the size from trailer, assume the next is 'xref'
        $xref = substr($this->output, intval($size), 4);

        if($xref !== 'xref') {
            return false;
        }

        return true;
    }
}
