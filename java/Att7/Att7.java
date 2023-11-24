package Att7;

import java.util.Scanner;

public class Att7 {
    public static void main(String[] args){
        //variavel String[] semana, armazena os nomes dos dias da semana
        String[] semana = {"Domingo","Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"};
        // variavel x para entrada do usuario
        int x;

        //Scanner para receber a entrada do usuario
        Scanner sc1 = new Scanner(System.in);
        System.out.println("Digite o numero do dia da semana: ");
        //Conversão para int x
        x = Integer.parseInt(sc1.next());
        //x-1 para o valor se adequar as posições de semana[]
        x-=1;

        //switch x, qualquer valor entre 0 e 7 exibira o dia da semana de acordo com semana[], fora disso exibira Dia Invalido.
        switch (x) {
            case 0,1,2,3,4,5,6,7:
                System.out.println(semana[x]);
                break;
            default:
            System.out.println("Dia invalido.");
                break;
        }
    }
    
}
