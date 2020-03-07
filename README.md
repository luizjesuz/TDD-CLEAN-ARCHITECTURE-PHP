# TDD-CLEAN-ARCHITECTURE-PHP

## Tecnologias utilizadas

- [x] husky - cria e executa hooks no git
- [x] lint-staged - executa comandos nos arquivos que estão em staged no git
- [x] php-cs - usado para formatar o código segundo a PSR-2 sempre que um commit for executado
- [x] phpunit - Biblioteca usada para fazer os testes unitários
- [x] phpstan - Ferramenta para analise estática do código antes de cada commit 
- [x] git-commit-msg-linter - Verifica se as mensagens de commit estão dentro do padrão <https://www.conventionalcommits.org/en/v1.0.0/>  

### O commit só será realizado se o código passar em todos os testes acima. Todos os testes são realizados automaticamente toda vez que um comando "git commit -m ''" for executado. Caso qualquer teste falhe o commit é cancelado
