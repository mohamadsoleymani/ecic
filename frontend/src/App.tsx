import { BrowserRouter, Routes, Route, Navigate } from "react-router";
import Login from "./pages/Login";
import Register from "./pages/Register";
import AdminDashboard from "./pages/AdminDashboard";
import ClientDashboard from "./pages/ClientDashboard";
import type { JSX } from 'react';

function PrivateRoute({ children, role }: { children: JSX.Element; role: string }) {
    const token = localStorage.getItem("token");
    const userRole = localStorage.getItem("role");
    if (!token) return <Navigate to="/login" />;
    if (userRole !== role) return <Navigate to="/login" />;
    return children;
}

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />

                <Route
                    path="/admin/dashboard"
                    element={
                        <PrivateRoute role="admin">
                            <AdminDashboard />
                        </PrivateRoute>
                    }
                />
                <Route
                    path="/client/dashboard"
                    element={
                        <PrivateRoute role="client">
                            <ClientDashboard />
                        </PrivateRoute>
                    }
                />
                <Route path="*" element={<Navigate to="/login" />} />
            </Routes>
        </BrowserRouter>
    );
}
