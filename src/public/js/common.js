const allQuiz  = document.querySelectorAll('.js-quiz');

const setDisabled = answers => {
  answers.forEach(answer => {
    answer.disabled = true;
  })
};
const setTitle = (target, isCorrect) => {
  target.innerText = isCorrect ? '正解！' : '不正解...';
}
const setClassName = (target, isCorrect) => {
  target.classList.add(isCorrect ? 'is-correct' : 'is-incorrect');
}


allQuiz.forEach(quiz => {
  const answers = quiz.querySelectorAll('.js-answer');
  const answerBox = quiz.querySelector('.js-answerBox');
  const answerTitle = quiz.querySelector('.js-answerTitle');
  const answerText = quiz.querySelector('.js-answerText');
  let answer_text = '';
  answers.forEach(answer => {
    if (answer.getAttribute('data-answer')==1){
      answer_text = answer.innerText;
    }
  })

  answers.forEach(answer => {
    answer.addEventListener('click', () => {
      answer.classList.add('is-selected');
      const selectedAnswerNumber = Number(answer.getAttribute('data-answer'));

      // 全てのボタンを非活性化
      setDisabled(answers);

      // 正解ならtrue, 不正解ならfalseをcheckCorrectに格納
      
      const isCorrect = selectedAnswerNumber === 1;

      // 回答欄にテキストやclass名を付与
      answerText.innerText = answer_text;
      setTitle(answerTitle, isCorrect);
      setClassName(answerBox, isCorrect);
    })
  })
})