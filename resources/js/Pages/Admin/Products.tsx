import React from 'react';
import { Head, usePage } from '@inertiajs/inertia-react';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

interface Product {
  id: number;
  name: string;
  price: number;
  description: string;
  stock: number;
}

interface PageProps {
  products: Product[];
}

const Products: React.FC<PageProps> = ({ products }) => {
  return (
    <AuthenticatedLayout
            header={
                <div className="flex gap-4">
                    <h2 className="text-xl font-semibold leading-tight text-gray-800">
                        Data Produk
                    </h2>
                </div>
            }
        >
        <div>
        <Head title="Products" />
        <h1 className="text-2xl font-bold mb-4">Products</h1>
        <table className="table-auto w-full">
            <thead>
            <tr>
                <th className="px-4 py-2">ID</th>
                <th className="px-4 py-2">Name</th>
                <th className="px-4 py-2">Price</th>
                <th className="px-4 py-2">Description</th>
                <th className="px-4 py-2">Stock</th>
            </tr>
            </thead>
            <tbody>
            {products.map((product) => (
                <tr key={product.id}>
                <td className="border px-4 py-2">{product.id}</td>
                <td className="border px-4 py-2">{product.name}</td>
                <td className="border px-4 py-2">{product.price}</td>
                <td className="border px-4 py-2">{product.description}</td>
                <td className="border px-4 py-2">{product.stock}</td>
                </tr>
            ))}
            </tbody>
        </table>
        </div>
    </AuthenticatedLayout>
  );
};

export default Products;
