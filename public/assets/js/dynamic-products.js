// Dynamic Products System - Products data and functionality
document.addEventListener('DOMContentLoaded', function() {
    
    // Product data for different categories
    const categoryData = {
        vegetables: {
            title: 'VEGETABLES',
            description: 'Fresh, organic vegetables delivered straight to your door. Quality guaranteed!',
            headerColor: 'bg-green-50',
            titleColor: 'text-green-600',
            products: [
                // Page 1 - Vegetables
                { id: 1, name: 'Potato', bengaliName: '', price: 50, unit: '1 kg', rating: 4.0, image: 'assets/images/veg/alu.png' },
                { id: 2, name: 'Brinjal', bengaliName: '(Begun)', price: 50, unit: '500 gm', rating: 4.2, image: 'assets/images/veg/begun.png' },
                { id: 3, name: 'Carrot', bengaliName: '(Gajor)', price: 48, unit: '500 gm', rating: 4.5, image: 'assets/images/veg/gajor.png' },
                { id: 4, name: 'Sweet Pumpkin', bengaliName: '(Mishti Kumra)', price: 45, unit: '1 kg', rating: 4.8, image: 'assets/images/veg/kumra.png' },
                { id: 5, name: 'Cabbage', bengaliName: '(Badha Kopi)', price: 35, unit: '1 piece', rating: 4.1, image: 'assets/images/veg/badhacopi.png' },
                { id: 6, name: 'Cauliflower', bengaliName: '(Phul Kopi)', price: 40, unit: '1 piece', rating: 4.3, image: 'assets/images/veg/fulcopi.png' },
                { id: 7, name: 'Spinach', bengaliName: '(Palong Shak)', price: 25, unit: '500 gm', rating: 4.7, image: 'assets/images/veg/palong.png' },
                { id: 8, name: 'Onion', bengaliName: '(Piyaj)', price: 55, unit: '1 kg', rating: 4.0, image: 'assets/images/veg/onion.png' },
                
                // Page 2 - Vegetables
                { id: 9, name: 'Tomato', bengaliName: '', price: 60, unit: '1 kg', rating: 4.2, image: 'assets/images/veg/tomato.png' },
                { id: 10, name: 'Cucumber', bengaliName: '(Shasha)', price: 30, unit: '1 kg', rating: 4.1, image: 'assets/images/veg/shosha.png' },
                { id: 11, name: 'Bell Pepper', bengaliName: '(Capsicum)', price: 120, unit: '500 gm', rating: 4.6, image: 'assets/images/capsicum.png' },
                { id: 12, name: 'Green Peas', bengaliName: '(Motorshuti)', price: 40, unit: '500 gm', rating: 4.3, image: 'assets/images/veg/green peas.png' },
                { id: 13, name: 'Okra', bengaliName: '(Bhindi)', price: 50, unit: '500 gm', rating: 4.0, image: 'assets/images/okra.png' },
                { id: 14, name: 'Bitter Gourd', bengaliName: '(Karela)', price: 45, unit: '500 gm', rating: 3.8, image: 'assets/images/veg/korola.png' },
                { id: 15, name: 'Radish', bengaliName: '(Moola)', price: 35, unit: '1 kg', rating: 4.1, image: 'assets/images/radish.png' },
                { id: 16, name: 'Turnip', bengaliName: '(Shalgun)', price: 40, unit: '1 kg', rating: 4.2, image: 'assets/images/turnip.png' },
                
                // Page 3 - Vegetables
                { id: 17, name: 'Lettuce', bengaliName: '', price: 80, unit: '500 gm', rating: 4.4, image: 'assets/images/lettuce.png' },
                { id: 18, name: 'Garlic', bengaliName: '(Rashun)', price: 180, unit: '500 gm', rating: 4.9, image: 'assets/images/garlic.png' },
                { id: 19, name: 'Ginger', bengaliName: '(Ada)', price: 150, unit: '500 gm', rating: 4.8, image: 'assets/images/ginger.png' },
                { id: 20, name: 'Green Chili', bengaliName: '(Kacha Morich)', price: 60, unit: '250 gm', rating: 4.2, image: 'assets/images/veg/chili.png' },
                { id: 21, name: 'Cilantro', bengaliName: '(Dhonia Pata)', price: 20, unit: '100 gm', rating: 4.3, image: 'assets/images/veg/dhonia.png' },
                { id: 22, name: 'Mint', bengaliName: '(Pudina Pata)', price: 15, unit: '100 gm', rating: 4.7, image: 'assets/images/mint.png' },
                { id: 23, name: 'Sweet Potato', bengaliName: '(Mishti Alu)', price: 45, unit: '1 kg', rating: 4.4, image: 'assets/images/sweet-potato.png' },
                { id: 24, name: 'Corn', bengaliName: '(Bhutta)', price: 30, unit: '1 piece', rating: 4.5, image: 'assets/images/corn.png' }
            ]
        },
        
        fruits: {
            title: 'FRUITS',
            description: 'Fresh, juicy fruits packed with vitamins and natural goodness. Delivered fresh!',
            headerColor: 'bg-red-50',
            titleColor: 'text-red-600',
            products: [
                // Page 1 - Fruits
                { id: 1, name: 'Apple', bengaliName: '(Apel)', price: 120, unit: '1 kg', rating: 4.6, image: 'assets/images/fruits/apple.png' },
                { id: 2, name: 'Banana', bengaliName: '(Kola)', price: 80, unit: '1 dozen', rating: 4.4, image: 'assets/images/fruits/banana.png' },
                { id: 3, name: 'Orange', bengaliName: '(Komola)', price: 100, unit: '1 kg', rating: 4.3, image: 'assets/images/fruits/orange.png' },
                { id: 4, name: 'Mango', bengaliName: '(Aam)', price: 150, unit: '1 kg', rating: 4.8, image: 'assets/images/fruits/mango.png' },
                { id: 5, name: 'Grapes', bengaliName: '(Angur)', price: 200, unit: '500 gm', rating: 4.5, image: 'assets/images/fruits/grapes.png' },
                { id: 6, name: 'Pineapple', bengaliName: '(Anaras)', price: 60, unit: '1 piece', rating: 4.2, image: 'assets/images/fruits/pineapple.png' },
                { id: 7, name: 'Watermelon', bengaliName: '(Tormuj)', price: 40, unit: '1 kg', rating: 4.1, image: 'assets/images/fruits/watermelon.png' },
                { id: 8, name: 'Pomegranate', bengaliName: '(Dalim)', price: 250, unit: '1 kg', rating: 4.7, image: 'assets/images/fruits/pomegranate.png' },
                
                // Page 2 - Fruits
                { id: 9, name: 'Guava', bengaliName: '(Peyara)', price: 80, unit: '1 kg', rating: 4.0, image: 'assets/images/fruits/guava.png' },
                { id: 10, name: 'Papaya', bengaliName: '(Pepe)', price: 45, unit: '1 kg', rating: 4.2, image: 'assets/images/fruits/papaya.png' },
                { id: 11, name: 'Jackfruit', bengaliName: '(Kathal)', price: 80, unit: '1 kg', rating: 4.4, image: 'assets/images/fruits/jackfruit.png' },
                { id: 12, name: 'Lemon', bengaliName: '(Lebu)', price: 120, unit: '1 kg', rating: 4.3, image: 'assets/images/fruits/lemon.png' },
                { id: 13, name: 'Coconut', bengaliName: '(Narikel)', price: 40, unit: '1 piece', rating: 4.1, image: 'assets/images/fruits/coconut.png' },
                { id: 14, name: 'Lychee', bengaliName: '(Lichu)', price: 180, unit: '1 kg', rating: 4.6, image: 'assets/images/fruits/lychee.png' },
                { id: 15, name: 'Strawberry', bengaliName: '', price: 300, unit: '500 gm', rating: 4.8, image: 'assets/images/fruits/strawberry.png' },
                { id: 16, name: 'Kiwi', bengaliName: '', price: 400, unit: '1 kg', rating: 4.5, image: 'assets/images/fruits/kiwi.png' },
                
                // Page 3 - Fruits
                { id: 17, name: 'Dragon Fruit', bengaliName: '', price: 500, unit: '1 kg', rating: 4.7, image: 'assets/images/fruits/dragon-fruit.png' },
                { id: 18, name: 'Avocado', bengaliName: '', price: 350, unit: '1 kg', rating: 4.4, image: 'assets/images/fruits/avocado.png' },
                { id: 19, name: 'Plum', bengaliName: '(Alubukhara)', price: 280, unit: '1 kg', rating: 4.2, image: 'assets/images/fruits/plum.png' },
                { id: 20, name: 'Peach', bengaliName: '(Peach)', price: 320, unit: '1 kg', rating: 4.3, image: 'assets/images/fruits/peach.png' },
                { id: 21, name: 'Blackberry', bengaliName: '', price: 400, unit: '500 gm', rating: 4.6, image: 'assets/images/fruits/blackberry.png' },
                { id: 22, name: 'Blueberry', bengaliName: '', price: 450, unit: '500 gm', rating: 4.8, image: 'assets/images/fruits/blueberry.png' },
                { id: 23, name: 'Cherry', bengaliName: '', price: 600, unit: '500 gm', rating: 4.9, image: 'assets/images/fruits/cherry.png' },
                { id: 24, name: 'Dates', bengaliName: '(Khejur)', price: 200, unit: '500 gm', rating: 4.5, image: 'assets/images/fruits/dates.png' }
            ]
        },
        
        meats: {
            title: 'MEATS',
            description: 'Fresh, premium quality meats from trusted sources. Hygienically processed!',
            headerColor: 'bg-red-50',
            titleColor: 'text-red-800',
            products: [
                // Page 1 - Meats
                { id: 1, name: 'Chicken', bengaliName: '(Murgi)', price: 280, unit: '1 kg', rating: 4.5, image: 'assets/images/meats/chicken.png' },
                { id: 2, name: 'Beef', bengaliName: '(Gorur Mangsho)', price: 650, unit: '1 kg', rating: 4.3, image: 'assets/images/meats/beef.png' },
                { id: 3, name: 'Mutton', bengaliName: '(Khashi)', price: 950, unit: '1 kg', rating: 4.6, image: 'assets/images/meats/mutton.png' },
                { id: 4, name: 'Duck', bengaliName: '(Hash)', price: 350, unit: '1 kg', rating: 4.2, image: 'assets/images/meats/duck.png' },
                { id: 5, name: 'Turkey', bengaliName: '(Turkey)', price: 450, unit: '1 kg', rating: 4.4, image: 'assets/images/meats/turkey.png' },
                { id: 6, name: 'Quail', bengaliName: '(Btter)', price: 400, unit: '1 kg', rating: 4.1, image: 'assets/images/meats/quail.png' },
                { id: 7, name: 'Rabbit', bengaliName: '(Khorgosh)', price: 500, unit: '1 kg', rating: 4.0, image: 'assets/images/meats/rabbit.png' },
                { id: 8, name: 'Liver', bengaliName: '(Kaleja)', price: 200, unit: '500 gm', rating: 3.9, image: 'assets/images/meats/liver.png' },
                
                // Add more meat products for pages 2 and 3...
                { id: 9, name: 'Chicken Breast', bengaliName: '(Murgi Buk)', price: 320, unit: '1 kg', rating: 4.4, image: 'assets/images/meats/chicken-breast.png' },
                { id: 10, name: 'Chicken Thigh', bengaliName: '(Murgi Raan)', price: 300, unit: '1 kg', rating: 4.3, image: 'assets/images/meats/chicken-thigh.png' },
                { id: 11, name: 'Minced Meat', bengaliName: '(Keema)', price: 400, unit: '1 kg', rating: 4.2, image: 'assets/images/meats/minced-meat.png' },
                { id: 12, name: 'Sausage', bengaliName: '', price: 350, unit: '500 gm', rating: 4.1, image: 'assets/images/meats/sausage.png' },
                { id: 13, name: 'Ham', bengaliName: '', price: 450, unit: '500 gm', rating: 4.0, image: 'assets/images/meats/ham.png' },
                { id: 14, name: 'Bacon', bengaliName: '', price: 500, unit: '500 gm', rating: 4.2, image: 'assets/images/meats/bacon.png' },
                { id: 15, name: 'Salami', bengaliName: '', price: 400, unit: '500 gm', rating: 4.1, image: 'assets/images/meats/salami.png' },
                { id: 16, name: 'Pepperoni', bengaliName: '', price: 450, unit: '500 gm', rating: 4.0, image: 'assets/images/meats/pepperoni.png' },
                
                // Page 3 - More meats
                { id: 17, name: 'Steak', bengaliName: '', price: 800, unit: '1 kg', rating: 4.7, image: 'assets/images/meats/steak.png' },
                { id: 18, name: 'Ribs', bengaliName: '(Pasli)', price: 600, unit: '1 kg', rating: 4.5, image: 'assets/images/meats/ribs.png' },
                { id: 19, name: 'Tongue', bengaliName: '(Jib)', price: 300, unit: '1 kg', rating: 3.8, image: 'assets/images/meats/tongue.png' },
                { id: 20, name: 'Heart', bengaliName: '(Hridoy)', price: 250, unit: '1 kg', rating: 3.7, image: 'assets/images/meats/heart.png' },
                { id: 21, name: 'Kidney', bengaliName: '(Gurda)', price: 280, unit: '1 kg', rating: 3.6, image: 'assets/images/meats/kidney.png' },
                { id: 22, name: 'Brain', bengaliName: '(Mogoj)', price: 350, unit: '500 gm', rating: 3.9, image: 'assets/images/meats/brain.png' },
                { id: 23, name: 'Tripe', bengaliName: '(Bhuri)', price: 200, unit: '1 kg', rating: 3.5, image: 'assets/images/meats/tripe.png' },
                { id: 24, name: 'Marrow', bengaliName: '(Majja)', price: 150, unit: '500 gm', rating: 3.8, image: 'assets/images/meats/marrow.png' }
            ]
        },
        
        fish: {
            title: 'FISH',
            description: 'Fresh catch from rivers and seas. Premium quality fish delivered fresh!',
            headerColor: 'bg-blue-50',
            titleColor: 'text-blue-600',
            products: [
                // Page 1 - Fish
                { id: 1, name: 'Hilsa', bengaliName: '(Ilish)', price: 800, unit: '1 kg', rating: 4.8, image: 'assets/images/fish/hilsa.png' },
                { id: 2, name: 'Rohu', bengaliName: '(Rui)', price: 350, unit: '1 kg', rating: 4.5, image: 'assets/images/fish/rohu.png' },
                { id: 3, name: 'Catla', bengaliName: '(Katla)', price: 400, unit: '1 kg', rating: 4.4, image: 'assets/images/fish/catla.png' },
                { id: 4, name: 'Salmon', bengaliName: '', price: 1200, unit: '1 kg', rating: 4.7, image: 'assets/images/fish/salmon.png' },
                { id: 5, name: 'Tuna', bengaliName: '', price: 900, unit: '1 kg', rating: 4.6, image: 'assets/images/fish/tuna.png' },
                { id: 6, name: 'Pomfret', bengaliName: '(Chapal)', price: 600, unit: '1 kg', rating: 4.3, image: 'assets/images/fish/pomfret.png' },
                { id: 7, name: 'Mackerel', bengaliName: '(Bangda)', price: 300, unit: '1 kg', rating: 4.2, image: 'assets/images/fish/mackerel.png' },
                { id: 8, name: 'Sardine', bengaliName: '(Sardin)', price: 250, unit: '1 kg', rating: 4.1, image: 'assets/images/fish/sardine.png' },
                
                // Page 2 - Fish
                { id: 9, name: 'Cod', bengaliName: '', price: 700, unit: '1 kg', rating: 4.4, image: 'assets/images/fish/cod.png' },
                { id: 10, name: 'Snapper', bengaliName: '', price: 650, unit: '1 kg', rating: 4.3, image: 'assets/images/fish/snapper.png' },
                { id: 11, name: 'Tilapia', bengaliName: '', price: 280, unit: '1 kg', rating: 4.0, image: 'assets/images/fish/tilapia.png' },
                { id: 12, name: 'Pangasius', bengaliName: '', price: 200, unit: '1 kg', rating: 3.9, image: 'assets/images/fish/pangasius.png' },
                { id: 13, name: 'Trout', bengaliName: '', price: 800, unit: '1 kg', rating: 4.5, image: 'assets/images/fish/trout.png' },
                { id: 14, name: 'Mrigal', bengaliName: '', price: 320, unit: '1 kg', rating: 4.2, image: 'assets/images/fish/mrigal.png' },
                { id: 15, name: 'Koi', bengaliName: '', price: 450, unit: '1 kg', rating: 4.3, image: 'assets/images/fish/koi.png' },
                { id: 16, name: 'Shing', bengaliName: '', price: 400, unit: '1 kg', rating: 4.1, image: 'assets/images/fish/shing.png' },
                
                // Page 3 - Fish
                { id: 17, name: 'Sole', bengaliName: '', price: 550, unit: '1 kg', rating: 4.2, image: 'assets/images/fish/sole.png' },
                { id: 18, name: 'Flounder', bengaliName: '', price: 500, unit: '1 kg', rating: 4.1, image: 'assets/images/fish/flounder.png' },
                { id: 19, name: 'Halibut', bengaliName: '', price: 900, unit: '1 kg', rating: 4.6, image: 'assets/images/fish/halibut.png' },
                { id: 20, name: 'Grouper', bengaliName: '', price: 700, unit: '1 kg', rating: 4.4, image: 'assets/images/fish/grouper.png' },
                { id: 21, name: 'Barramundi', bengaliName: '', price: 600, unit: '1 kg', rating: 4.3, image: 'assets/images/fish/barramundi.png' },
                { id: 22, name: 'Sea Bass', bengaliName: '', price: 750, unit: '1 kg', rating: 4.5, image: 'assets/images/fish/sea-bass.png' },
                { id: 23, name: 'Kingfish', bengaliName: '', price: 650, unit: '1 kg', rating: 4.2, image: 'assets/images/fish/kingfish.png' },
                { id: 24, name: 'Anchovy', bengaliName: '', price: 200, unit: '1 kg', rating: 3.8, image: 'assets/images/fish/anchovy.png' }
            ]
        },
        
        seafood: {
            title: 'SEA FOOD',
            description: 'Fresh seafood from the ocean. Premium quality crabs, prawns, and more!',
            headerColor: 'bg-teal-50',
            titleColor: 'text-teal-600',
            products: [
                // Page 1 - Seafood
                { id: 1, name: 'Prawn', bengaliName: '(Chingri)', price: 600, unit: '1 kg', rating: 4.6, image: 'assets/images/seafood/prawn.png' },
                { id: 2, name: 'Crab', bengaliName: '(Kakra)', price: 800, unit: '1 kg', rating: 4.7, image: 'assets/images/seafood/crab.png' },
                { id: 3, name: 'Lobster', bengaliName: '', price: 1500, unit: '1 kg', rating: 4.9, image: 'assets/images/seafood/lobster.png' },
                { id: 4, name: 'Shrimp', bengaliName: '', price: 500, unit: '1 kg', rating: 4.4, image: 'assets/images/seafood/shrimp.png' },
                { id: 5, name: 'Oyster', bengaliName: '', price: 400, unit: '1 kg', rating: 4.2, image: 'assets/images/seafood/oyster.png' },
                { id: 6, name: 'Mussel', bengaliName: '', price: 300, unit: '1 kg', rating: 4.1, image: 'assets/images/seafood/mussel.png' },
                { id: 7, name: 'Scallop', bengaliName: '', price: 700, unit: '1 kg', rating: 4.5, image: 'assets/images/seafood/scallop.png' },
                { id: 8, name: 'Squid', bengaliName: '', price: 450, unit: '1 kg', rating: 4.0, image: 'assets/images/seafood/squid.png' },
                
                // Page 2 - Seafood
                { id: 9, name: 'Octopus', bengaliName: '', price: 550, unit: '1 kg', rating: 4.1, image: 'assets/images/seafood/octopus.png' },
                { id: 10, name: 'Sea Urchin', bengaliName: '', price: 800, unit: '1 kg', rating: 4.3, image: 'assets/images/seafood/sea-urchin.png' },
                { id: 11, name: 'Clam', bengaliName: '', price: 350, unit: '1 kg', rating: 4.0, image: 'assets/images/seafood/clam.png' },
                { id: 12, name: 'Cockle', bengaliName: '', price: 300, unit: '1 kg', rating: 3.9, image: 'assets/images/seafood/cockle.png' },
                { id: 13, name: 'Whelk', bengaliName: '', price: 400, unit: '1 kg', rating: 3.8, image: 'assets/images/seafood/whelk.png' },
                { id: 14, name: 'Conch', bengaliName: '', price: 500, unit: '1 kg', rating: 4.2, image: 'assets/images/seafood/conch.png' },
                { id: 15, name: 'Abalone', bengaliName: '', price: 1200, unit: '1 kg', rating: 4.8, image: 'assets/images/seafood/abalone.png' },
                { id: 16, name: 'Sea Cucumber', bengaliName: '', price: 900, unit: '1 kg', rating: 4.1, image: 'assets/images/seafood/sea-cucumber.png' },
                
                // Page 3 - Seafood
                { id: 17, name: 'King Crab', bengaliName: '', price: 2000, unit: '1 kg', rating: 4.9, image: 'assets/images/seafood/king-crab.png' },
                { id: 18, name: 'Snow Crab', bengaliName: '', price: 1800, unit: '1 kg', rating: 4.8, image: 'assets/images/seafood/snow-crab.png' },
                { id: 19, name: 'Langoustine', bengaliName: '', price: 1000, unit: '1 kg', rating: 4.6, image: 'assets/images/seafood/langoustine.png' },
                { id: 20, name: 'Crayfish', bengaliName: '', price: 700, unit: '1 kg', rating: 4.4, image: 'assets/images/seafood/crayfish.png' },
                { id: 21, name: 'Barnacle', bengaliName: '', price: 600, unit: '1 kg', rating: 4.0, image: 'assets/images/seafood/barnacle.png' },
                { id: 22, name: 'Periwinkle', bengaliName: '', price: 250, unit: '1 kg', rating: 3.7, image: 'assets/images/seafood/periwinkle.png' },
                { id: 23, name: 'Razor Clam', bengaliName: '', price: 450, unit: '1 kg', rating: 4.2, image: 'assets/images/seafood/razor-clam.png' },
                { id: 24, name: 'Geoduck', bengaliName: '', price: 1500, unit: '1 kg', rating: 4.7, image: 'assets/images/seafood/geoduck.png' }
            ]
        },
        
        dairy: {
            title: 'DAIRY',
            description: 'Fresh dairy products from trusted farms. Pure and nutritious!',
            headerColor: 'bg-yellow-50',
            titleColor: 'text-yellow-600',
            products: [
                // Page 1 - Dairy
                { id: 1, name: 'Milk', bengaliName: '(Dudh)', price: 60, unit: '1 liter', rating: 4.5, image: 'assets/images/dairy/milk.png' },
                { id: 2, name: 'Cheese', bengaliName: '', price: 400, unit: '500 gm', rating: 4.4, image: 'assets/images/dairy/cheese.png' },
                { id: 3, name: 'Butter', bengaliName: '(Makhan)', price: 200, unit: '500 gm', rating: 4.3, image: 'assets/images/dairy/butter.png' },
                { id: 4, name: 'Yogurt', bengaliName: '(Doi)', price: 80, unit: '500 gm', rating: 4.6, image: 'assets/images/dairy/yogurt.png' },
                { id: 5, name: 'Cream', bengaliName: '(Cream)', price: 150, unit: '500 ml', rating: 4.2, image: 'assets/images/dairy/cream.png' },
                { id: 6, name: 'Condensed Milk', bengaliName: '', price: 120, unit: '400 gm', rating: 4.1, image: 'assets/images/dairy/condensed-milk.png' },
                { id: 7, name: 'Powdered Milk', bengaliName: '', price: 500, unit: '1 kg', rating: 4.0, image: 'assets/images/dairy/powdered-milk.png' },
                { id: 8, name: 'Ghee', bengaliName: '', price: 600, unit: '1 kg', rating: 4.7, image: 'assets/images/dairy/ghee.png' },
                
                // Page 2 - Dairy
                { id: 9, name: 'Mozzarella', bengaliName: '', price: 450, unit: '500 gm', rating: 4.5, image: 'assets/images/dairy/mozzarella.png' },
                { id: 10, name: 'Cheddar', bengaliName: '', price: 500, unit: '500 gm', rating: 4.4, image: 'assets/images/dairy/cheddar.png' },
                { id: 11, name: 'Cottage Cheese', bengaliName: '(Paneer)', price: 300, unit: '500 gm', rating: 4.3, image: 'assets/images/dairy/cottage-cheese.png' },
                { id: 12, name: 'Sour Cream', bengaliName: '', price: 180, unit: '500 ml', rating: 4.1, image: 'assets/images/dairy/sour-cream.png' },
                { id: 13, name: 'Buttermilk', bengaliName: '(Ghol)', price: 50, unit: '1 liter', rating: 4.2, image: 'assets/images/dairy/buttermilk.png' },
                { id: 14, name: 'Whipped Cream', bengaliName: '', price: 200, unit: '500 ml', rating: 4.0, image: 'assets/images/dairy/whipped-cream.png' },
                { id: 15, name: 'Greek Yogurt', bengaliName: '', price: 120, unit: '500 gm', rating: 4.6, image: 'assets/images/dairy/greek-yogurt.png' },
                { id: 16, name: 'Ricotta', bengaliName: '', price: 350, unit: '500 gm', rating: 4.2, image: 'assets/images/dairy/ricotta.png' },
                
                // Page 3 - Dairy
                { id: 17, name: 'Parmesan', bengaliName: '', price: 800, unit: '500 gm', rating: 4.8, image: 'assets/images/dairy/parmesan.png' },
                { id: 18, name: 'Gouda', bengaliName: '', price: 600, unit: '500 gm', rating: 4.5, image: 'assets/images/dairy/gouda.png' },
                { id: 19, name: 'Brie', bengaliName: '', price: 700, unit: '500 gm', rating: 4.6, image: 'assets/images/dairy/brie.png' },
                { id: 20, name: 'Camembert', bengaliName: '', price: 750, unit: '500 gm', rating: 4.4, image: 'assets/images/dairy/camembert.png' },
                { id: 21, name: 'Blue Cheese', bengaliName: '', price: 900, unit: '500 gm', rating: 4.1, image: 'assets/images/dairy/blue-cheese.png' },
                { id: 22, name: 'Feta', bengaliName: '', price: 400, unit: '500 gm', rating: 4.3, image: 'assets/images/dairy/feta.png' },
                { id: 23, name: 'Mascarpone', bengaliName: '', price: 500, unit: '500 gm', rating: 4.4, image: 'assets/images/dairy/mascarpone.png' },
                { id: 24, name: 'Clotted Cream', bengaliName: '', price: 300, unit: '500 ml', rating: 4.2, image: 'assets/images/dairy/clotted-cream.png' }
            ]
        }
    };

    // Check if we're on the products page
    const productsContainer = document.getElementById('products-container');
    if (!productsContainer) {
        console.log('Products container not found');
        return;
    }

    // Get current category from URL or window variable
    const currentCategory = window.currentCategory || 'vegetables';
    console.log('Current category:', currentCategory);

    // Load category data
    const categoryInfo = categoryData[currentCategory];
    if (!categoryInfo) {
        console.error('Category data not found for:', currentCategory);
        return;
    }

    // Update page title and header
    updatePageHeader(categoryInfo);
    
    // Load products
    loadProducts(categoryInfo);
    
    // Initialize pagination
    initializePagination(categoryInfo);

    // Function to update page header
    function updatePageHeader(categoryInfo) {
        // Update page title
        const pageTitle = document.getElementById('page-title');
        if (pageTitle) {
            pageTitle.textContent = `${categoryInfo.title} - Bazar Shadai`;
        }

        // Update category title
        const categoryTitle = document.getElementById('category-title');
        if (categoryTitle) {
            categoryTitle.textContent = categoryInfo.title;
            categoryTitle.className = categoryInfo.titleColor;
        }

        // Update category description
        const categoryDescription = document.getElementById('category-description');
        if (categoryDescription) {
            categoryDescription.textContent = categoryInfo.description;
        }

        // Update header background
        const categoryHeader = document.getElementById('category-header');
        if (categoryHeader) {
            categoryHeader.className = `py-12 mt-0 ${categoryInfo.headerColor}`;
        }
    }

    // Function to load products
    function loadProducts(categoryInfo) {
        const productsPerPage = 8;
        const totalPages = Math.ceil(categoryInfo.products.length / productsPerPage);
        
        // Clear existing products
        productsContainer.innerHTML = '';

        // Create product pages
        for (let page = 1; page <= totalPages; page++) {
            const startIndex = (page - 1) * productsPerPage;
            const endIndex = startIndex + productsPerPage;
            const pageProducts = categoryInfo.products.slice(startIndex, endIndex);
            
            const pageDiv = document.createElement('div');
            pageDiv.className = `product-page grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 ${page === 1 ? 'active' : ''}`;
            pageDiv.setAttribute('data-page', page);
            pageDiv.style.display = page === 1 ? 'grid' : 'none';

            // Create product cards
            pageProducts.forEach(product => {
                const productCard = createProductCard(product);
                pageDiv.appendChild(productCard);
            });

            productsContainer.appendChild(pageDiv);
        }

        // Update product count
        const productCount = document.getElementById('product-count');
        if (productCount) {
            productCount.textContent = `Showing 1-${Math.min(productsPerPage, categoryInfo.products.length)} of ${categoryInfo.products.length} products`;
        }
    }

    // Function to create product card
    function createProductCard(product) {
        const card = document.createElement('div');
        card.className = 'product-card bg-white rounded-2xl shadow-md overflow-hidden';
        
        const stars = '★'.repeat(Math.floor(product.rating)) + '☆'.repeat(5 - Math.floor(product.rating));
        
        card.innerHTML = `
            <div class="p-6">
                <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4">
                    <img src="${product.image}" alt="${product.name}" class="h-32 w-32 object-contain" onerror="this.src='assets/images/placeholder.png'">
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">${product.name} ${product.bengaliName}</h3>
                <div class="flex items-center justify-between mb-3">
                    <span class="price-text text-green-600">৳ ${product.price}<span class="text-sm text-gray-500">/= ${product.unit}</span></span>
                </div>
                <div class="flex items-center mb-4">
                    <div class="star-rating flex">
                        <span>${stars}</span>
                    </div>
                    <span class="text-sm text-gray-500 ml-2">(${product.rating})</span>
                </div>
                <div class="flex space-x-2">
                    <button class="btn-buy-now flex-1 py-2 px-4 rounded-lg font-medium transition duration-300">
                        BUY NOW
                    </button>
                    <button class="btn-add-cart flex-1 py-2 px-4 rounded-lg font-medium transition duration-300">
                        ADD TO CART
                    </button>
                </div>
            </div>
        `;
        
        return card;
    }

    // Function to initialize pagination
    function initializePagination(categoryInfo) {
        const productsPerPage = 8;
        const totalProducts = categoryInfo.products.length;
        const totalPages = Math.ceil(totalProducts / productsPerPage);
        let currentPage = 1;

        // Get DOM elements
        const productPages = document.querySelectorAll('.product-page');
        const pageNumbers = document.querySelectorAll('.page-number');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const productCount = document.getElementById('product-count');

        // Update page numbers
        const pageNumbersContainer = document.getElementById('page-numbers');
        if (pageNumbersContainer) {
            pageNumbersContainer.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.className = `pagination-btn page-number px-4 py-2 rounded-lg transition duration-300 ${i === 1 ? 'bg-green-600 text-white active' : 'border border-gray-300 hover:bg-gray-100'}`;
                button.setAttribute('data-page', i);
                button.textContent = i;
                
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const page = parseInt(this.dataset.page);
                    goToPage(page);
                });
                
                pageNumbersContainer.appendChild(button);
            }
        }

        // Initialize pagination
        updatePagination();

        // Previous button handler
        if (prevBtn) {
            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentPage > 1) {
                    goToPage(currentPage - 1);
                }
            });
        }

        // Next button handler
        if (nextBtn) {
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentPage < totalPages) {
                    goToPage(currentPage + 1);
                }
            });
        }

        // Function to go to specific page
        function goToPage(page) {
            if (page < 1 || page > totalPages) return;
            
            currentPage = page;
            updatePagination();
            
            // Smooth scroll to top of products section
            if (productsContainer) {
                productsContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        // Function to update pagination display
        function updatePagination() {
            // Hide all product pages
            productPages.forEach(page => {
                page.classList.remove('active');
                page.style.display = 'none';
            });

            // Show current page products
            const currentProductPage = document.querySelector(`.product-page[data-page="${currentPage}"]`);
            if (currentProductPage) {
                currentProductPage.classList.add('active');
                currentProductPage.style.display = 'grid';
            }

            // Update page number buttons
            const updatedPageNumbers = document.querySelectorAll('.page-number');
            updatedPageNumbers.forEach(btn => {
                btn.classList.remove('active', 'bg-green-600', 'text-white');
                btn.classList.add('border', 'border-gray-300', 'hover:bg-gray-100');
                
                if (parseInt(btn.dataset.page) === currentPage) {
                    btn.classList.add('active', 'bg-green-600', 'text-white');
                    btn.classList.remove('border', 'border-gray-300', 'hover:bg-gray-100');
                }
            });

            // Update Previous button
            if (prevBtn) {
                if (currentPage === 1) {
                    prevBtn.classList.add('disabled');
                    prevBtn.style.opacity = '0.5';
                    prevBtn.style.cursor = 'not-allowed';
                    prevBtn.disabled = true;
                } else {
                    prevBtn.classList.remove('disabled');
                    prevBtn.style.opacity = '1';
                    prevBtn.style.cursor = 'pointer';
                    prevBtn.disabled = false;
                }
            }

            // Update Next button
            if (nextBtn) {
                if (currentPage === totalPages) {
                    nextBtn.classList.add('disabled');
                    nextBtn.style.opacity = '0.5';
                    nextBtn.style.cursor = 'not-allowed';
                    nextBtn.disabled = true;
                } else {
                    nextBtn.classList.remove('disabled');
                    nextBtn.style.opacity = '1';
                    nextBtn.style.cursor = 'pointer';
                    nextBtn.disabled = false;
                }
            }

            // Update product count
            if (productCount) {
                const startProduct = (currentPage - 1) * productsPerPage + 1;
                const endProduct = Math.min(currentPage * productsPerPage, totalProducts);
                productCount.textContent = `Showing ${startProduct}-${endProduct} of ${totalProducts} products`;
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!productsContainer) return;

            if (e.key === 'ArrowLeft' && currentPage > 1) {
                e.preventDefault();
                goToPage(currentPage - 1);
            } else if (e.key === 'ArrowRight' && currentPage < totalPages) {
                e.preventDefault();
                goToPage(currentPage + 1);
            }
        });
    }

    console.log('Dynamic products system initialized for category:', currentCategory);
});
