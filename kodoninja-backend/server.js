const express = require('express');
const nodemailer = require('nodemailer');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
require('dotenv').config();

const app = express();
app.use(express.json());

const users = new Map();

// Email transporter
const transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: process.env.EMAIL_USER,
    pass: process.env.EMAIL_PASS,
  },
});

// Register endpoint
app.post('/register', async (req, res) => {
  const { username, email, password } = req.body;
  if (users.has(email)) {
    return res.status(400).json({ error: 'User already exists' });
  }

  const hashedPassword = await bcrypt.hash(password, 10);
  const confirmationToken = jwt.sign({ email }, process.env.JWT_SECRET, { expiresIn: '1h' });

  users.set(email, {
    username,
    email,
    password: hashedPassword,
    confirmed: false,
    confirmationToken,
  });

  // Send confirmation email
  const mailOptions = {
    from: process.env.EMAIL_USER,
    to: email,
    subject: 'Confirm Your kodoninja Account',
    text: `Click this link to confirm your account: http://localhost:3000/confirm/${confirmationToken}`,
  };

  transporter.sendMail(mailOptions, (error) => {
    if (error) {
      return res.status(500).json({ error: 'Failed to send email' });
    }
    res.status(200).json({ message: 'Confirmation email sent' });
  });
});

// Confirm email endpoint
app.get('/confirm/:token', (req, res) => {
  const { token } = req.params;
  try {
    const { email } = jwt.verify(token, process.env.JWT_SECRET);
    const user = users.get(email);
    if (!user) {
      return res.status(404).json({ error: 'User not found' });
    }
    user.confirmed = true;
    users.set(email, user);
    res.status(200).json({ message: 'Email confirmed' });
  } catch (error) {
    res.status(400).json({ error: 'Invalid or expired token' });
  }
});

app.get('/profile/:username', (req, res) => {
  const { username } = req.params;
  for (let [email, user] of users) {
    if (user.username === username) {
      return res.status(200).json(user);
    }
  }
  res.status(404).json({ error: 'User not found' });
});

// Login endpoint
app.post('/login', async (req, res) => {
  const { email, password } = req.body;
  const user = users.get(email);
  if (!user || !user.confirmed) {
    return res.status(400).json({ error: 'User not found or email not confirmed' });
  }

  const isMatch = await bcrypt.compare(password, user.password);
  if (!isMatch) {
    return res.status(400).json({ error: 'Invalid credentials' });
  }

  const token = jwt.sign({ email }, process.env.JWT_SECRET, { expiresIn: '1d' });
  res.status(200).json({ token, username: user.username });
});

app.listen(3000, () => console.log('Server running on port 3000'));
