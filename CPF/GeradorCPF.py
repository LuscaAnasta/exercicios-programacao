import random
condicao = True
while condicao:
    contador = 10

    cpf = [random.randint(0,9) for i in range(9)]

    resultado = 0
    for i in cpf:
        resultado+= i*contador
        contador-=1
    resultado*=10
    resultado %= 11
    resultado = resultado if resultado<10 else 0
        
    cpf.append(resultado)

    contador = 11
    resultado = 0

    for i in cpf:
        resultado+= i*contador
        contador-=1
    resultado*=10
    resultado %= 11
    resultado = resultado if resultado<10 else 0

    cpf.append(resultado)
    strings = [str(x) for x in cpf]
    cpf_unido = ''.join(strings)
    if cpf_unido != cpf_unido[::-1]:
        
        condicao = False
    
else:
    print(f'CPF: {cpf_unido[:3]}.{cpf_unido[3:6]}.{cpf_unido[6:9]}-{cpf_unido[9:]}')
    