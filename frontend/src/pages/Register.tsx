import { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router";

export default function Register() {
    const [name, setName] = useState("");
    const [mobile, setMobile] = useState("");
    const [password, setPassword] = useState("");
    const [passwordConfirm, setPasswordConfirm] = useState("");
    const [error, setError] = useState("");
    const navigate = useNavigate();

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        setError("");

        if (password !== passwordConfirm) {
            setError("رمز عبور و تکرار آن یکسان نیست");
            return;
        }

        try {
            await axios.post("/api/register", { name, mobile, password, password_confirmation: passwordConfirm });
            navigate("/login");
        } catch (e: any) {
            setError(e.response?.data?.message || "خطا در ثبت نام");
        }
    };

    return (
        <div className="max-w-md mx-auto mt-20 p-6 bg-white rounded shadow">
            <h2 className="text-2xl mb-4">ثبت نام</h2>
            {error && <p className="text-red-500">{error}</p>}
            <form onSubmit={handleSubmit}>
                <input
                    type="text"
                    placeholder="نام کامل"
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                    className="border p-2 w-full mb-3"
                    required
                />
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
                <input
                    type="password"
                    placeholder="تکرار رمز عبور"
                    value={passwordConfirm}
                    onChange={(e) => setPasswordConfirm(e.target.value)}
                    className="border p-2 w-full mb-3"
                    required
                />
                <button
                    type="submit"
                    className="bg-green-600 text-white py-2 rounded w-full hover:bg-green-700"
                >
                    ثبت نام
                </button>
            </form>
        </div>
    );
}
