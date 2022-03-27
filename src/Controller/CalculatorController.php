<?php
namespace App\Controller;

use App\CalculatorService;
use App\Entity\Calculator;
use App\Form\CalculatorType;
use App\Operator\DivideOperation;
use App\Operator\MinusOperation;
use App\Operator\MultiplyOperation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Operator\PlusOperation;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculate")
     */
    public function calculate(Request $request): Response
    {
        $calculatorService = new CalculatorService();
        $calculatorInstance = new Calculator();
        $form = $this->createForm(CalculatorType::class, $calculatorInstance);
        $result = null;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $input = $form->getData();
            // ... perform calculation here
            /* @TODO find a better way to auto-wire the selected operation
             * or move this to the service class instead? */
            $operatorSelected = $input->getOperation().'Operation';
            //$calculatorService->addOperator($input->getOperation(), new $operatorSelected());

            //add all the operators we want to use
            $calculatorService->addOperator('Plus', new PlusOperation());
            $calculatorService->addOperator('Minus', new MinusOperation());
            $calculatorService->addOperator('Multiply', new MultiplyOperation());
            $calculatorService->addOperator('Divide', new DivideOperation());

            $result = $calculatorService->calculate($input->getOperation(), $input->getNumber1(), $input->getNumber2());

        }
        return $this->renderForm('calculator.html.twig', [
            'form' => $form,
            'result' => $result
        ]);

    }
}
