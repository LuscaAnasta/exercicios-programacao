package Att6;

import java.util.Arrays;
import java.util.Scanner;

public class Att6 {
    public static void main(String[] args){
        //variavel int[] n para armazenar as entradas do usuario
        int[] n= {0,0,0};
        //variavel String x para receber a entrado do usuario
        String x;

        System.out.println("Digite 3 numeros:");
        //sequencia de Scanner para receber as 3 entradas do usuario
        Scanner sc1 = new Scanner(System.in);
        x = sc1.next();
        // conversão de String x para int n[0]
        n[0] = Integer.parseInt(x);
        
        Scanner sc2 = new Scanner(System.in);
        x = sc2.next();
        n[1] = Integer.parseInt(x);

        Scanner sc3 = new Scanner(System.in);
        x = sc3.next();
        n[2] = Integer.parseInt(x);

        //Função sort(), organiza em ordem crescente n[]
        Arrays.sort(n);

        //Print que mostrara o menor valor de n[]
        System.out.println("O menor numero é "+n[0]);

        
        
        
}

}
