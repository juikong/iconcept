import axios from 'axios';
import { useEffect, useState } from 'react';

const Index = () => {
    const [products, setProducts] = useState<{ id: number; title: string; thumbnail: string; price: number }[]>([]);

    useEffect(() => {
        fetchProducts();
    }, []);

    const fetchProducts = async () => {
        axios
            .get('/api/products')
            .then((response) => {
                const data = response.data;
                setProducts(data);
            })
            .catch((error) => {
                console.error('Error fetching products:', error);
            });
    };

    return (
        <div>
            <h1>Product List</h1>
            <ul className="grid grid-cols-1 gap-4 md:grid-cols-3">
                {products.map((product) => (
                    <li key={product.id} className="rounded border p-4 shadow">
                        <img src={`/img/${product.thumbnail}`} alt={product.title} className="mb-2 h-32 w-full rounded object-cover" />
                        <h2 className="text-lg font-bold">{product.title}</h2>
                        <p className="text-gray-600">${product.price}</p>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Index;
