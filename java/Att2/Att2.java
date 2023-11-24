package Att2;

import java.util.Scanner;

public class Att2 {
    public static void main(String[] args){
        //Variavel String[] lista, armazenando nomes de produtos
        String[] lista = {"Maçã    ", "Azeitona", "Abacaxi ","Manga   ","Maracuja"};
        //Variavel double[] preco, armazenando valores
        double[] preco = {12, 15, 3, 70, 16.99};
        //Variavel double para armazenar total da compra, int x para entrada do usuario
        double total = 0;
        int x;
        //Variavel int[] r para armazenar valores de x
        int[] r = {0,0,0,0,0};
        
        //for para exibir itens da String[] lista
        for(int i = 0; i <5; i++ ){
            
            System.out.println(String.format("[%s] - %s ---- %s",i+1, lista[i], preco[i]));
        }
        System.out.println("Digite 5 itens que deseja comprar: ");

        //Sequencia de Scanner para receber entrada do usuario
            System.out.printf("Numero do item: ");
            Scanner sc1 = new Scanner(System.in);
            x = Integer.parseInt(sc1.nextLine());
            //if para alterar variavel x se for maior que 5, para limitar escolhas do usuario
            if(x<0 || x>5){
                x=5;
            }
            System.out.println(x);
            //Adicionando o valor de x em int[] r na posição 0
            r[0] = x-1;
            
            //a partir daqui uma repetição de entradas

            System.out.printf("Numero do item: ");
            Scanner sc2 = new Scanner(System.in);
            x = Integer.parseInt(sc2.nextLine());
            if(x<0 || x>5){
                x=5;
            }
            System.out.println(x);
            r[1] = x-1;
            

            System.out.printf("Numero do item: ");
            Scanner sc3 = new Scanner(System.in);
            x = Integer.parseInt(sc3.nextLine());
            if(x<0 || x>5){
                x=5;
            }
            System.out.println(x);
            r[2] = x-1;
            

            System.out.printf("Numero do item: ");
            Scanner sc4 = new Scanner(System.in);
            x = Integer.parseInt(sc4.nextLine());
            if(x<0 || x>5){
                x=5;
            }
            System.out.println(x);
            r[3] = x-1;
            

            System.out.printf("Numero do item: ");
            Scanner sc5 = new Scanner(System.in);
            x = Integer.parseInt(sc5.nextLine());
            if(x<0 || x>5){
                x=5;
            }
            System.out.println(x);
            r[4] = x-1;
            

        System.out.println("Sua Compra:");
        //for para exibir itens escolhidos pelo usuario
        for(int i = 0; i <5; i++ ){
            
            System.out.println(String.format("[%s] - %s ---- %s",i+1, lista[r[i]], preco[r[i]]));
            total+= preco[r[i]];
        }
        System.out.println("Total da compra é R$"+ total);


    }
    
}
