package Att8;

import java.util.Scanner;

public class Att8 {
    public static void main(String[] args){
        //variavel x para receber entrada do usuario e t para somar o total
        int x=0, t=0;
        //loop de repetição while
        while(true){
            //Scanner para receber entrada do usuario
            Scanner sc1 = new Scanner(System.in);
            System.out.println("Digite um numero: ");
            //conversão de String para int x
            x = Integer.parseInt(sc1.next());
            //soma de x para o valor de t
            t+=x;
            //if para que assim que o usuario digitar 0 encerrara o programa
            if(x==0){
                break;
            }
            
        }
        //Print para exibir o total da soma dos valores de x
        System.out.println("A soma total é: "+t);
    }
}
