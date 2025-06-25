<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Tabuada</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="calculadora.css">
 
  
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
           
            <div class="bg-gradient text-white py-6 px-8 text-center">
                <h1 class="text-3xl font-bold mb-2">Calculadora de Tabuada</h1>
                <p class="opacity-90">Digite um número e veja sua tabuada completa</p>
            </div>
            
          
            <div class="p-8">
                <form id="tabuadaForm" class="mb-6">
                    <div class="mb-6">
                        <label for="numero" class="block text-gray-700 font-medium mb-2">Digite um número:</label>
                        <div class="relative">
                            <input 
                                type="number" 
                                id="numero" 
                                name="numero" 
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                placeholder="Ex: 5"
                                required
                                min="1"
                                step="1"
                            >
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <i class="fas fa-calculator text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full bg-gradient hover:opacity-90 text-white font-bold py-3 px-4 rounded-lg transition duration-300 flex items-center justify-center"
                    >
                        <i class="fas fa-magic mr-2"></i> Gerar Tabuada
                    </button>
                </form>
                
              
                <div id="resultContainer" class="hidden">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Tabuada do <span id="numeroSelecionado" class="text-purple-600">0</span></h3>
                    
                    <div class="bg-gray-50 rounded-lg overflow-hidden">
                        <div id="resultList" class="divide-y divide-gray-200">
                            
                        </div>
                    </div>
                    
                    <div class="mt-4 flex justify-center">
                       
                    </div>
                </div>
            </div>
            
           
            <div class="bg-gray-50 px-8 py-4 text-center text-gray-600 text-sm">
                <p>Calculadora desenvolvida com HTML, CSS e JavaScript</p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('tabuadaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const numero = parseInt(document.getElementById('numero').value);
            const resultContainer = document.getElementById('resultContainer');
            const resultList = document.getElementById('resultList');
            const numeroSelecionado = document.getElementById('numeroSelecionado');
            
            
            resultList.innerHTML = '';
            
          
            numeroSelecionado.textContent = numero;
            
            
            for (let i = 1; i <= 10; i++) {
                const resultado = numero * i;
                
                const resultItem = document.createElement('div');
                resultItem.className = 'result-item p-4 text-gray-800';
                resultItem.innerHTML = `
                    <div class="flex justify-between items-center">
                        <span class="font-medium">${numero} × ${i} =</span>
                        <span class="text-purple-600 font-bold text-lg">${resultado}</span>
                    </div>
                `;
                
                resultList.appendChild(resultItem);
            }
            
           
            resultContainer.classList.remove('hidden');
            resultContainer.classList.add('fade-in');
        });
        
    
    </script>
</body>
</html>

