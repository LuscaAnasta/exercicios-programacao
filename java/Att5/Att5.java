package Att5;

import java.util.Scanner;

public class Att5 {
    public static void main(String[] args){
        //variaveis double para o calculo da media
        double n1, n2, m;
        //variaveis String para a entrada do usuario
        String x;

        //Scanner para a entrada da nota 1 e nota 2
        System.out.println("Digite nota 1:");
        Scanner sc1 = new Scanner(System.in);
        x = sc1.next();
        //Conversão de String x para double n1 e n2
        n1 = Double.parseDouble(x);
        System.out.println("Digite nota 2:");
        Scanner sc2 = new Scanner(System.in);
        x = sc2.next();
        n2 = Double.parseDouble(x);

        //calculo da media
        m=(n2+n1)/2;

        //print exibindo a media do usuario
        System.out.println("\n\nMedia final : "+m);
        //if checando que m é menor que 6, se sim aparecera 'REPROVADO' se não 'APROVADO'
        if(m<6){
            System.out.println("Reprovado");
        }else{
            System.out.println("Aprovado");
        }
        
    }
}
