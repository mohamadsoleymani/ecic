import { useLoginMutation } from '../services/auth';
import { useNavigate } from 'react-router';
import { useState } from 'react';

export default function Login() {
    const [mobile, setMobile] = useState('');
    const [password, setPassword] = useState('');
    const [login, {  error }] = useLoginMutation();
    const navigate = useNavigate();

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();

        try {
            const res = await login({ mobile, password }).unwrap();
            localStorage.setItem('token', res.token);
            localStorage.setItem('role', res.user.base_role);
            if (res.user.base_role === 'admin') {
                navigate('/admin/dashboard');
            } else {
                navigate('/client/dashboard');
            }
        } catch (err) {
            console.error(err);
        }
    };

    return (
        <div className="max-w-md mx-auto mt-20 p-6 bg-white rounded shadow">
            <h2 className="text-2xl mb-4">ورود</h2>
            {error && <p className="text-red-500"></p>}
            <form onSubmit={handleSubmit}>
                <input
                    type="text"
                    placeholder="شماره موبایل"
                    value={mobile}
                    onChange={(e) => setMobile(e.target.value)}
                    className="border p-2 w-full mb-3"
                    required
                />
                <input
                    type="password"
                    placeholder="رمز عبور"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                    className="border p-2 w-full mb-3"
                    required
                />
                <button
                    type="submit"
                    className="bg-blue-600 text-white py-2 rounded w-full hover:bg-blue-700"
                >
                    ورود
                </button>
            </form>
        </div>
    );
}
