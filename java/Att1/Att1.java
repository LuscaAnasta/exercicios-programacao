package Att1;

import java.util.Scanner;

public class Att1 {
    public static void main(String[] args){
        //variaveis de entrada do usuario
        String nome, cep, idade;

        //Scanner para receber a variavel nome
        Scanner sc1 = new Scanner(System.in);
        System.out.printf("Digite seu nome: ");
        nome = sc1.nextLine();
        //sc1.close();

        //Scanner para receber a variavel idade
        Scanner sc2 = new Scanner(System.in);
        System.out.printf("Digite sua idade: ");
        idade = sc2.nextLine();
        //sc2.close();

        //Scanner para receber a variavel cep
        Scanner sc3 = new Scanner(System.in);
        System.out.printf("Digite seu endereço: ");
        cep = sc3.nextLine();
        //sc3.close();

        //Print com as informações do usuario, utilizando String.format()
        System.out.printf(String.format("Seu nome é %s, tem %s anos e mora em %s", nome, idade, cep));
        
    }
}
