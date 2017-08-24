#!groovy

node{
  // -------------------------------
  // ----- STAGE: 'Pull'
  // -------------------------------
  stage ('Pull'){
    echo 'Machen PULL'
    sh 'rm -rf *'
    checkout scm

  }

  // -------------------------------
  // ----- STAGE: 'Test'
  // -------------------------------
  stage ('Test'){
    echo "Test"
    sh('cat index.php')

  }


  // -------------------------------
  // ----- STAGE: 'Merge to Test'
  // -------------------------------
  stage ('Merge_To_Test'){


  }

  // -------------------------------
  // ----- STAGE: 'Push'
  // -------------------------------
  stage ('Push_branch_Test'){
      echo "Merge To Test"
      sh('git branch -av')
      if (BRANCH_NAME == "master") {
                  echo " rama = ${BRANCH_NAME} "
               }
               else {
                  echo "Not in 'master' branch. Don't attempt publishing. Estas en --->> ${BRANCH_NAME}"
               }

 }

}
